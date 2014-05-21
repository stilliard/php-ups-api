<?php
namespace Ups\Tests\Entity\QuantumViewResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  UAPAddressTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $uAPAddress = new \Ups\Entity\QuantumViewResponse\UAPAddress();

        $xml = $uAPAddress->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewResponse/UAPAddress.xsd'));
    }
}
