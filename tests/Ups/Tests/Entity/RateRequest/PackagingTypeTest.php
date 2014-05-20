<?php
namespace Ups\Tests\Entity\RateRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  PackagingTypeTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $packagingType = new \Ups\Entity\RateRequest\PackagingType();
        $packagingType->setCode('TestString');

        $xml = $packagingType->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateRequest/PackagingType.xsd'));
    }
}
