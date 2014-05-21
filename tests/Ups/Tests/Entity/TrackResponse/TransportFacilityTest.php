<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  TransportFacilityTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $transportFacility = new \Ups\Entity\TrackResponse\TransportFacility();
        $transportFacility->setType('TestString');

        $xml = $transportFacility->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/TransportFacility.xsd'));
    }
}
