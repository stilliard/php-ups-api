<?php
namespace Ups\Tests\Entity\QuantumViewResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  SaturdayPickupTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $saturdayPickup = new \Ups\Entity\QuantumViewResponse\SaturdayPickup();

        $xml = $saturdayPickup->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewResponse/SaturdayPickup.xsd'));
    }
}
