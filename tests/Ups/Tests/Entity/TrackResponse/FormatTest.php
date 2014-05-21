<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  FormatTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $format = new \Ups\Entity\TrackResponse\Format();
        $format->setCode('TestString');

        $xml = $format->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/Format.xsd'));
    }
}
