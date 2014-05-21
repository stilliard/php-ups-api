<?php
namespace Ups\Tests\Entity\QuantumViewResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  AddressExtendedInformationTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $addressExtendedInformation = new \Ups\Entity\QuantumViewResponse\AddressExtendedInformation();

        $xml = $addressExtendedInformation->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewResponse/AddressExtendedInformation.xsd'));
    }
}
