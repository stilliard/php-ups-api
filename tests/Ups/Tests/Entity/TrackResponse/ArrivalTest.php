<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ArrivalTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $arrival = new \Ups\Entity\TrackResponse\Arrival();
        $arrival->setDate('TestString');

        $xml = $arrival->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/Arrival.xsd'));
    }
}
