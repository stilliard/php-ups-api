<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  UPSAPAddressTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $uPSAPAddress = new \Ups\Entity\TrackResponse\UPSAPAddress();

        $xml = $uPSAPAddress->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/UPSAPAddress.xsd'));
    }
}
