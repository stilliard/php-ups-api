<?php
namespace Ups\Tests\Entity\RateRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ShipFromTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $shipFrom = new \Ups\Entity\RateRequest\ShipFrom();
        $shipFrom->setAddress(new \Ups\Entity\RateRequest\Address());

        $xml = $shipFrom->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateRequest/ShipFrom.xsd'));
    }
}
