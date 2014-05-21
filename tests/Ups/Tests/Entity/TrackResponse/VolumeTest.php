<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  VolumeTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $volume = new \Ups\Entity\TrackResponse\Volume();
        $volume->setValue('TestString');

        $xml = $volume->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/Volume.xsd'));
    }
}
