<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  RequestedTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $requested = new \Ups\Entity\TrackResponse\Requested();
        $requested->setDate('TestString');

        $xml = $requested->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/Requested.xsd'));
    }
}
