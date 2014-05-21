<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  LocationTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $location = new \Ups\Entity\TrackResponse\Location();

        $xml = $location->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/Location.xsd'));
    }
}
