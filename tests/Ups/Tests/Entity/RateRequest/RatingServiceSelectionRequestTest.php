<?php
namespace Ups\Tests\Entity\RateRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  RatingServiceSelectionRequestTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $ratingServiceSelectionRequest = new \Ups\Entity\RateRequest\RatingServiceSelectionRequest();
        $ratingServiceSelectionRequest->setRequest(new \Ups\Entity\RateRequest\Request());
        $ratingServiceSelectionRequest->setShipment(new \Ups\Entity\RateRequest\Shipment());

        $xml = $ratingServiceSelectionRequest->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateRequest/RatingServiceSelectionRequest.xsd'));
    }
}
