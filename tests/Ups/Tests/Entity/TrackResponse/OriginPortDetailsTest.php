<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  OriginPortDetailsTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $originPortDetails = new \Ups\Entity\TrackResponse\OriginPortDetails();

        $xml = $originPortDetails->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/OriginPortDetails.xsd'));
    }
}
