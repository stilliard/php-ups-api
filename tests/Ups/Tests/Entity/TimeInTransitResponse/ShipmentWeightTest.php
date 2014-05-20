<?php
namespace Ups\Tests\Entity\TimeInTransitResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ShipmentWeightTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $shipmentWeight = new \Ups\Entity\TimeInTransitResponse\ShipmentWeight();
        $shipmentWeight->setWeight('TestString');

        $xml = $shipmentWeight->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TimeInTransitResponse/ShipmentWeight.xsd'));
    }
}
