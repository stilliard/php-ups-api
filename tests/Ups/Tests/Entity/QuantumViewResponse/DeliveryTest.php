<?php
namespace Ups\Tests\Entity\QuantumViewResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  DeliveryTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $delivery = new \Ups\Entity\QuantumViewResponse\Delivery();
        $delivery->setShipperNumber('TestString');
        $delivery->setTrackingNumber('TestString');
        $delivery->setDate('TestString');
        $delivery->setTime('TestString');

        $xml = $delivery->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewResponse/Delivery.xsd'));
    }
}
