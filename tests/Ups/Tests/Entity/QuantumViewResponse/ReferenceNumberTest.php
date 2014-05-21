<?php
namespace Ups\Tests\Entity\QuantumViewResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ReferenceNumberTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $referenceNumber = new \Ups\Entity\QuantumViewResponse\ReferenceNumber();
        $referenceNumber->setValue('TestString');

        $xml = $referenceNumber->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewResponse/ReferenceNumber.xsd'));
    }
}
