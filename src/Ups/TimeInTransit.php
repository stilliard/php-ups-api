<?php

namespace Ups;

use DOMDocument;
use SimpleXMLElement;
use Exception;
use Ups\Entity\TimeInTransitRequest;
use Ups\Entity\TimeInTransitResponse;

/**
 * TimeInTransit API Wrapper
 *
 * @package ups
 * @author Sebastien Vergnes <sebastien@vergnes.eu>
 */
class TimeInTransit extends Ups
{
    protected $endpoint = '/TimeInTransit';

    public function getTimeInTransit($shipment)
    {
        return $this->sendRequest($shipment);
    }

    /**
     * Creates and sends a request for the given shipment. This handles checking for
     * errors in the response back from UPS
     *
     * @param $timeInTransitRequest
     * @return TimeInTransitResponse\TimeInTransitResponse
     * @throws \Exception
     */
    private function sendRequest($timeInTransitRequest)
    {
        $request = $this->createRequest($timeInTransitRequest);
        $response = $this->request($this->createAccess(), $request, $this->compileEndpointUrl($this->endpoint));

        if ($response->Response->ResponseStatusCode == 0) {
            throw new Exception(
                "Failure ({$response->Response->Error->ErrorSeverity}): {$response->Response->Error->ErrorDescription}",
                (int)$response->Response->Error->ErrorCode
            );
        } else {
            return $this->formatResponse($response);
        }
    }

    /**
     * Create the TimeInTransit request
     *
     * @param TimeInTransitRequest\TimeInTransitRequest $timeInTransitRequest The request details. Refer to the UPS documentation for available structure
     * @return  string
     */
    private function createRequest($timeInTransitRequest)
    {
        $timeInTransitRequest->getRequest()->setRequestAction('TimeInTransit');
        $timeInTransitRequest->getRequest()->setTransactionReference(new TimeInTransitRequest\TransactionReference());
        $xml = new DOMDocument();
        $xml->formatOutput = true;
        $xml->appendChild($timeInTransitRequest->toNode($xml));

        return $xml->saveXML();
    }

    /**
     * Format the response
     *
     * @param   SimpleXMLElement $response
     * @return  TimeInTransitResponse\TimeInTransitResponse
     */
    private function formatResponse(SimpleXMLElement $response)
    {
        // We don't need to return data regarding the response to the user
        unset($response->Response);

        $result = $this->convertXmlObject($response);

        return new TimeInTransitResponse\TimeInTransitResponse($result->TransitResponse);
    }
}