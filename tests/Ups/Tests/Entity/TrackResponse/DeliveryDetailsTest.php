<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  DeliveryDetailsTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $deliveryDetails = new \Ups\Entity\TrackResponse\DeliveryDetails();

        $xml = $deliveryDetails->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/DeliveryDetails.xsd'));
    }
}
