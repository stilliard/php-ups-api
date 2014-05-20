<?php
namespace Ups\Tests\Entity\TimeInTransitRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  TimeInTransitRequestTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $timeInTransitRequest = new \Ups\Entity\TimeInTransitRequest\TimeInTransitRequest();
        $timeInTransitRequest->setRequest(new \Ups\Entity\TimeInTransitRequest\Request());
        $timeInTransitRequest->setTransitFrom(new \Ups\Entity\TimeInTransitRequest\TransitFrom());
        $timeInTransitRequest->setTransitTo(new \Ups\Entity\TimeInTransitRequest\TransitTo());
        $timeInTransitRequest->setPickupDate('TestString');

        $xml = $timeInTransitRequest->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TimeInTransitRequest/TimeInTransitRequest.xsd'));
    }
}
