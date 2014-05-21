<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  EstimatedDeliveryDetailsTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $estimatedDeliveryDetails = new \Ups\Entity\TrackResponse\EstimatedDeliveryDetails();

        $xml = $estimatedDeliveryDetails->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/EstimatedDeliveryDetails.xsd'));
    }
}
