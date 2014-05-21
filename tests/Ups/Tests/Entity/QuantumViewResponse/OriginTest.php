<?php
namespace Ups\Tests\Entity\QuantumViewResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  OriginTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $origin = new \Ups\Entity\QuantumViewResponse\Origin();
        $origin->setShipperNumber('TestString');
        $origin->setTrackingNumber('TestString');
        $origin->setDate('TestString');
        $origin->setTime('TestString');

        $xml = $origin->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewResponse/Origin.xsd'));
    }
}
