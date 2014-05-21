<?php
namespace Ups\Tests\Entity\QuantumViewResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  GenericShipToTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $genericShipTo = new \Ups\Entity\QuantumViewResponse\GenericShipTo();

        $xml = $genericShipTo->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewResponse/GenericShipTo.xsd'));
    }
}
