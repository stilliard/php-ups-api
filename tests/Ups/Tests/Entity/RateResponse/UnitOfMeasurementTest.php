<?php
namespace Ups\Tests\Entity\RateResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  UnitOfMeasurementTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $unitOfMeasurement = new \Ups\Entity\RateResponse\UnitOfMeasurement();
        $unitOfMeasurement->setCode('TestString');

        $xml = $unitOfMeasurement->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateResponse/UnitOfMeasurement.xsd'));
    }
}
