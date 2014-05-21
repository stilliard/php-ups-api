<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  WeightTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $weight = new \Ups\Entity\TrackResponse\Weight();

        $xml = $weight->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/Weight.xsd'));
    }
}
