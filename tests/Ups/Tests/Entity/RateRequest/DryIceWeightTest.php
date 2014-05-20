<?php
namespace Ups\Tests\Entity\RateRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  DryIceWeightTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $dryIceWeight = new \Ups\Entity\RateRequest\DryIceWeight();
        $dryIceWeight->setUnitOfMeasurement(new \Ups\Entity\RateRequest\UnitOfMeasurement());
        $dryIceWeight->setWeight('TestString');

        $xml = $dryIceWeight->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateRequest/DryIceWeight.xsd'));
    }
}
