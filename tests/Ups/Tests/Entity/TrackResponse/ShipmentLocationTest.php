<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ShipmentLocationTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $shipmentLocation = new \Ups\Entity\TrackResponse\ShipmentLocation();

        $xml = $shipmentLocation->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/ShipmentLocation.xsd'));
    }
}
