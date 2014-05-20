<?php
namespace Ups\Tests\Entity\TimeInTransitResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  TransitResponseTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $transitResponse = new \Ups\Entity\TimeInTransitResponse\TransitResponse();
        $transitResponse->setTransitFrom(new \Ups\Entity\TimeInTransitResponse\TransitFrom());
        $transitResponse->setTransitTo(new \Ups\Entity\TimeInTransitResponse\TransitTo());
        $transitResponse->setPickupDate('TestString');
        $transitResponse->setServiceSummary(array(new \Ups\Entity\TimeInTransitResponse\ServiceSummary()));

        $xml = $transitResponse->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TimeInTransitResponse/TransitResponse.xsd'));
    }
}
