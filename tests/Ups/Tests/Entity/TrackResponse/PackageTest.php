<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  PackageTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $package = new \Ups\Entity\TrackResponse\Package();

        $xml = $package->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/Package.xsd'));
    }
}
