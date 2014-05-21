<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  EstimatedDepartureTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $estimatedDeparture = new \Ups\Entity\TrackResponse\EstimatedDeparture();
        $estimatedDeparture->setDate('TestString');

        $xml = $estimatedDeparture->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/EstimatedDeparture.xsd'));
    }
}
