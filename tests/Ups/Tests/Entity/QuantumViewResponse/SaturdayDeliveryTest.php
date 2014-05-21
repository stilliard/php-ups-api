<?php
namespace Ups\Tests\Entity\QuantumViewResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  SaturdayDeliveryTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $saturdayDelivery = new \Ups\Entity\QuantumViewResponse\SaturdayDelivery();

        $xml = $saturdayDelivery->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewResponse/SaturdayDelivery.xsd'));
    }
}
