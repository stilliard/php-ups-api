<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ActivityLocationTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $activityLocation = new \Ups\Entity\TrackResponse\ActivityLocation();

        $xml = $activityLocation->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/ActivityLocation.xsd'));
    }
}
