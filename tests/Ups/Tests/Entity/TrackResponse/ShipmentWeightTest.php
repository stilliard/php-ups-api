<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ShipmentWeightTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $shipmentWeight = new \Ups\Entity\TrackResponse\ShipmentWeight();

        $xml = $shipmentWeight->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/ShipmentWeight.xsd'));
    }
}
