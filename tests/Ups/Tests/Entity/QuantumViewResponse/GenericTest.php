<?php
namespace Ups\Tests\Entity\QuantumViewResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  GenericTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $generic = new \Ups\Entity\QuantumViewResponse\Generic();
        $generic->setActivityType('TestString');
        $generic->setTrackingNumber('TestString');

        $xml = $generic->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewResponse/Generic.xsd'));
    }
}
