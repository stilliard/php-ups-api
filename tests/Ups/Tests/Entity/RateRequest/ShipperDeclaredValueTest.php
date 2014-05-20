<?php
namespace Ups\Tests\Entity\RateRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ShipperDeclaredValueTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $shipperDeclaredValue = new \Ups\Entity\RateRequest\ShipperDeclaredValue();
        $shipperDeclaredValue->setCurrencyCode('TestString');
        $shipperDeclaredValue->setMonetaryValue('TestString');

        $xml = $shipperDeclaredValue->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateRequest/ShipperDeclaredValue.xsd'));
    }
}
