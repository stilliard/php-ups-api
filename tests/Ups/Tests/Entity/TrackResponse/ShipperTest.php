<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ShipperTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $shipper = new \Ups\Entity\TrackResponse\Shipper();

        $xml = $shipper->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/Shipper.xsd'));
    }
}
