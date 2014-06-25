<?php

namespace Ups;

use DOMDocument;
use SimpleXMLElement;
use Exception;
use Ups\Entity\RateRequest;
use Ups\Entity\RateResponse;
use Ups\Entity\RateResponse\RatingServiceSelectionResponse;

/**
 * Rate API Wrapper
 *
 * @package ups
 * @author Michael Williams <michael.williams@limelyte.com>
 */
class Rate extends Ups
{
    private $requestOption;

    protected $endpoint = '/Rate';

    public function shopRates($rateRequest)
    {
        if ($rateRequest instanceof RateRequest\Shipment) {
            $shipment = $rateRequest;
            $rateRequest = new RateRequest\RatingServiceSelectionRequest();
            $rateRequest->setShipment($shipment);
        }

        $this->requestOption = "Shop";

        return $this->sendRequest($rateRequest);
    }

    public function getRate($rateRequest)
    {
        if ($rateRequest instanceof RateRequest\Shipment) {
            $shipment = $rateRequest;
            $rateRequest = new RateRequest\RatingServiceSelectionRequest();
            $rateRequest->setShipment($shipment);
        }

        $this->requestOption = "Rate";

        return $this->sendRequest($rateRequest);
    }

    /**
     * Creates and sends a request for the given shipment. This handles checking for
     * errors in the response back from UPS
     *
     * @param $rateRequest
     * @return RateResponse\RatingServiceSelectionResponse
     * @throws \Exception
     */
    private function sendRequest($rateRequest)
    {
        $request = $this->createRequest($rateRequest);
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
     * Create the Rate request
     *
     * @param RateRequest\RatingServiceSelectionRequest $rateRequest The request details. Refer to the UPS documentation for available structure
     * @return  string
     */
    private function createRequest($rateRequest)
    {
        $rateRequest->getRequest()->setRequestAction('Rate');
        $rateRequest->getRequest()->setRequestOption($this->requestOption);
        $rateRequest->getRequest()->setTransactionReference(new RateRequest\TransactionReference());
        $xml = new DOMDocument();
        $xml->formatOutput = true;
        $xml->appendChild($rateRequest->toNode($xml));

        return $xml->saveXML();
    }

    /**
     * Format the response
     *
     * @param   SimpleXMLElement $response
     * @return  RateResponse\RatingServiceSelectionResponse
     */
    private function formatResponse(SimpleXMLElement $response)
    {
        // We don't need to return data regarding the response to the user
        unset($response->Response);

        $result = $this->convertXmlObject($response);

        return new RatingServiceSelectionResponse($result);
    }
}