<?php
namespace Ups\Tests\Entity\RateRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  OnCallAirTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $onCallAir = new \Ups\Entity\RateRequest\OnCallAir();

        $xml = $onCallAir->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateRequest/OnCallAir.xsd'));
    }
}
