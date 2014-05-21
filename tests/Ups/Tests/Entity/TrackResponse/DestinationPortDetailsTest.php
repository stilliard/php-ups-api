<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  DestinationPortDetailsTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $destinationPortDetails = new \Ups\Entity\TrackResponse\DestinationPortDetails();

        $xml = $destinationPortDetails->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/DestinationPortDetails.xsd'));
    }
}
