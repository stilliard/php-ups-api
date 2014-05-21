<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  DateTimeTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $dateTime = new \Ups\Entity\TrackResponse\DateTime();
        $dateTime->setDate('TestString');

        $xml = $dateTime->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/DateTime.xsd'));
    }
}
