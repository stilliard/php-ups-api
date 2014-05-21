<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ShipmentServiceOptionsTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $shipmentServiceOptions = new \Ups\Entity\TrackResponse\ShipmentServiceOptions();

        $xml = $shipmentServiceOptions->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/ShipmentServiceOptions.xsd'));
    }
}
