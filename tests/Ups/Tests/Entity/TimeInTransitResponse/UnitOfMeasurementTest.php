<?php
namespace Ups\Tests\Entity\TimeInTransitResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  UnitOfMeasurementTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $unitOfMeasurement = new \Ups\Entity\TimeInTransitResponse\UnitOfMeasurement();
        $unitOfMeasurement->setCode('TestString');

        $xml = $unitOfMeasurement->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TimeInTransitResponse/UnitOfMeasurement.xsd'));
    }
}
