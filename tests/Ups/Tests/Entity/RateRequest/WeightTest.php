<?php
namespace Ups\Tests\Entity\RateRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  WeightTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $weight = new \Ups\Entity\RateRequest\Weight();
        $weight->setUnitOfMeasurement(new \Ups\Entity\RateRequest\UnitOfMeasurement());
        $weight->setWeight('TestString');

        $xml = $weight->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateRequest/Weight.xsd'));
    }
}
