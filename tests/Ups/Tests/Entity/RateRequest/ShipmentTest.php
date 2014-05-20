<?php
namespace Ups\Tests\Entity\RateRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ShipmentTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $shipment = new \Ups\Entity\RateRequest\Shipment();
        $shipment->setShipper(new \Ups\Entity\RateRequest\Shipper());
        $shipment->setShipTo(new \Ups\Entity\RateRequest\ShipTo());

        $xml = $shipment->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateRequest/Shipment.xsd'));
    }
}
