<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  RerouteTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $reroute = new \Ups\Entity\TrackResponse\Reroute();

        $xml = $reroute->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/Reroute.xsd'));
    }
}
