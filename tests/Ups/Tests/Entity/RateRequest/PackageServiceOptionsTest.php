<?php
namespace Ups\Tests\Entity\RateRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  PackageServiceOptionsTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $packageServiceOptions = new \Ups\Entity\RateRequest\PackageServiceOptions();

        $xml = $packageServiceOptions->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateRequest/PackageServiceOptions.xsd'));
    }
}
