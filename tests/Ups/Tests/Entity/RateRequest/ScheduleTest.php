<?php
namespace Ups\Tests\Entity\RateRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ScheduleTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $schedule = new \Ups\Entity\RateRequest\Schedule();

        $xml = $schedule->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateRequest/Schedule.xsd'));
    }
}
