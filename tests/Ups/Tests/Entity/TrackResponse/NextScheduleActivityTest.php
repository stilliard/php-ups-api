<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  NextScheduleActivityTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $nextScheduleActivity = new \Ups\Entity\TrackResponse\NextScheduleActivity();

        $xml = $nextScheduleActivity->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/NextScheduleActivity.xsd'));
    }
}
