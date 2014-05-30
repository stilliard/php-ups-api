<?php

namespace Ups;

use DOMDocument;
use SimpleXMLElement;
use Exception;
use Ups\Entity\LabelRecoveryRequest;
use Ups\Entity\LabelRecoveryResponse;

/**
 * LabelRecovery API Wrapper
 *
 * @package ups
 * @author Sebastien Vergnes <sebastien@vergnes.eu>
 */
class LabelRecovery extends Ups
{
    protected $endpoint = '/LabelRecovery';

    public function getLabelRecovery($shipment)
    {
        return $this->sendRequest($shipment);
    }

    /**
     * Creates and sends a request for the given shipment. This handles checking for
     * errors in the response back from UPS
     *
     * @param $labelRecoveryRequest
     * @return LabelRecoveryResponse\LabelRecoveryResponse
     * @throws \Exception
     */
    private function sendRequest($labelRecoveryRequest)
    {
        $request = $this->createRequest($labelRecoveryRequest);
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
     * Create the LabelRecovery request
     *
     * @param LabelRecoveryRequest\LabelRecoveryRequest $labelRecoveryRequest The request details. Refer to the UPS documentation for available structure
     * @return  string
     */
    private function createRequest($labelRecoveryRequest)
    {
        $labelRecoveryRequest->getRequest()->setRequestAction('LabelRecovery');
        $labelRecoveryRequest->getRequest()->setTransactionReference(new LabelRecoveryRequest\TransactionReference());
        $xml = new DOMDocument();
        $xml->formatOutput = true;
        $xml->appendChild($labelRecoveryRequest->toNode($xml));

        return $xml->saveXML();
    }

    /**
     * Format the response
     *
     * @param   SimpleXMLElement $response
     * @return  LabelRecoveryResponse\LabelRecoveryResponse
     */
    private function formatResponse(SimpleXMLElement $response)
    {
        // We don't need to return data regarding the response to the user
        unset($response->Response);

        $result = $this->convertXmlObject($response);

        return new LabelRecoveryResponse\LabelRecoveryResponse($result->LabelRecoveryResponse);
    }
}