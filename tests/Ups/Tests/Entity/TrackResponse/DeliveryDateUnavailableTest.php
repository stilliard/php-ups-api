<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  DeliveryDateUnavailableTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $deliveryDateUnavailable = new \Ups\Entity\TrackResponse\DeliveryDateUnavailable();

        $xml = $deliveryDateUnavailable->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/DeliveryDateUnavailable.xsd'));
    }
}
