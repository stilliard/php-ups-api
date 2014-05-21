<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  TrackResponseTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $trackResponse = new \Ups\Entity\TrackResponse\TrackResponse();
        $trackResponse->setResponse(new \Ups\Entity\TrackResponse\Response());

        $xml = $trackResponse->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/TrackResponse.xsd'));
    }
}
