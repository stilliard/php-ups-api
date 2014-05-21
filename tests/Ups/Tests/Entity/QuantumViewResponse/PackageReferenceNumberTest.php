<?php
namespace Ups\Tests\Entity\QuantumViewResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  PackageReferenceNumberTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $packageReferenceNumber = new \Ups\Entity\QuantumViewResponse\PackageReferenceNumber();
        $packageReferenceNumber->setValue('TestString');

        $xml = $packageReferenceNumber->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewResponse/PackageReferenceNumber.xsd'));
    }
}
