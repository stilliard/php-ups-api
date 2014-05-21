<?php
namespace Ups\Tests\Entity\QuantumViewResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ShipToAddressTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $shipToAddress = new \Ups\Entity\QuantumViewResponse\ShipToAddress();

        $xml = $shipToAddress->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewResponse/ShipToAddress.xsd'));
    }
}
