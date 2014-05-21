<?php
namespace Ups\Tests\Entity\TrackRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ShipperAccountInfoTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $shipperAccountInfo = new \Ups\Entity\TrackRequest\ShipperAccountInfo();
        $shipperAccountInfo->setCountryCode('TestString');

        $xml = $shipperAccountInfo->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackRequest/ShipperAccountInfo.xsd'));
    }
}
