<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  CarrierActivityInformationTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $carrierActivityInformation = new \Ups\Entity\TrackResponse\CarrierActivityInformation();

        $xml = $carrierActivityInformation->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/CarrierActivityInformation.xsd'));
    }
}
