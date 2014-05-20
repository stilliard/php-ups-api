<?php
namespace Ups\Tests\Entity\RateRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  InsuranceTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $insurance = new \Ups\Entity\RateRequest\Insurance();

        $xml = $insurance->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateRequest/Insurance.xsd'));
    }
}
