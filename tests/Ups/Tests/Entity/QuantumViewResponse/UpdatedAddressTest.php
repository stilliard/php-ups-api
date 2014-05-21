<?php
namespace Ups\Tests\Entity\QuantumViewResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  UpdatedAddressTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $updatedAddress = new \Ups\Entity\QuantumViewResponse\UpdatedAddress();

        $xml = $updatedAddress->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewResponse/UpdatedAddress.xsd'));
    }
}
