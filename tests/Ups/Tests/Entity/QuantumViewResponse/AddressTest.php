<?php
namespace Ups\Tests\Entity\QuantumViewResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  AddressTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $address = new \Ups\Entity\QuantumViewResponse\Address();

        $xml = $address->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewResponse/Address.xsd'));
    }
}
