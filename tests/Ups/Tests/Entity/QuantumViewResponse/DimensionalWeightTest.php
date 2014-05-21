<?php
namespace Ups\Tests\Entity\QuantumViewResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  DimensionalWeightTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $dimensionalWeight = new \Ups\Entity\QuantumViewResponse\DimensionalWeight();
        $dimensionalWeight->setWeight('TestString');

        $xml = $dimensionalWeight->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewResponse/DimensionalWeight.xsd'));
    }
}
