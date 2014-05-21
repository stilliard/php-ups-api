<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  EstimatedArrivalTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $estimatedArrival = new \Ups\Entity\TrackResponse\EstimatedArrival();
        $estimatedArrival->setDate('TestString');

        $xml = $estimatedArrival->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/EstimatedArrival.xsd'));
    }
}
