<?php
namespace Ups\Tests\Entity\RateRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  PackageWeightTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $packageWeight = new \Ups\Entity\RateRequest\PackageWeight();
        $packageWeight->setUnitOfMeasurement(new \Ups\Entity\RateRequest\UnitOfMeasurement());
        $packageWeight->setWeight('TestString');

        $xml = $packageWeight->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateRequest/PackageWeight.xsd'));
    }
}
