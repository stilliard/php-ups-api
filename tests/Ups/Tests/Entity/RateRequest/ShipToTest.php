<?php
namespace Ups\Tests\Entity\RateRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ShipToTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $shipTo = new \Ups\Entity\RateRequest\ShipTo();
        $shipTo->setAddress(new \Ups\Entity\RateRequest\Address());

        $xml = $shipTo->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateRequest/ShipTo.xsd'));
    }
}
