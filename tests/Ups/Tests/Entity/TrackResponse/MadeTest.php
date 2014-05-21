<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  MadeTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $made = new \Ups\Entity\TrackResponse\Made();
        $made->setDate('TestString');

        $xml = $made->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/Made.xsd'));
    }
}
