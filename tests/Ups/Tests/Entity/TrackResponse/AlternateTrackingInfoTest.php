<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  AlternateTrackingInfoTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $alternateTrackingInfo = new \Ups\Entity\TrackResponse\AlternateTrackingInfo();
        $alternateTrackingInfo->setValue('TestString');

        $xml = $alternateTrackingInfo->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/AlternateTrackingInfo.xsd'));
    }
}
