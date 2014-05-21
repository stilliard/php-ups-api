<?php
namespace Ups\Tests\Entity\TrackRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ShipmentTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $shipment = new \Ups\Entity\TrackRequest\Shipment();
        $shipment->setCode('TestString');

        $xml = $shipment->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackRequest/Shipment.xsd'));
    }
}
