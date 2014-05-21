<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ManifestTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $manifest = new \Ups\Entity\TrackResponse\Manifest();
        $manifest->setDate('TestString');

        $xml = $manifest->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/Manifest.xsd'));
    }
}
