<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ShipToTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $shipTo = new \Ups\Entity\TrackResponse\ShipTo();

        $xml = $shipTo->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/ShipTo.xsd'));
    }
}
