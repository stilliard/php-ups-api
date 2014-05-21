<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  DepartureTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $departure = new \Ups\Entity\TrackResponse\Departure();
        $departure->setDate('TestString');

        $xml = $departure->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/Departure.xsd'));
    }
}
