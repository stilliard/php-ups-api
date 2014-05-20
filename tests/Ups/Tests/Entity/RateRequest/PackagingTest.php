<?php
namespace Ups\Tests\Entity\RateRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  PackagingTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $packaging = new \Ups\Entity\RateRequest\Packaging();
        $packaging->setCode('TestString');

        $xml = $packaging->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateRequest/Packaging.xsd'));
    }
}
