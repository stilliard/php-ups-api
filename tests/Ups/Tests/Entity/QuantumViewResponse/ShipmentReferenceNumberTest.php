<?php
namespace Ups\Tests\Entity\QuantumViewResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ShipmentReferenceNumberTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $shipmentReferenceNumber = new \Ups\Entity\QuantumViewResponse\ShipmentReferenceNumber();
        $shipmentReferenceNumber->setValue('TestString');

        $xml = $shipmentReferenceNumber->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewResponse/ShipmentReferenceNumber.xsd'));
    }
}
