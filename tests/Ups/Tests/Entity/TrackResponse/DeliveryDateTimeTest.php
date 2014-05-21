<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  DeliveryDateTimeTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $deliveryDateTime = new \Ups\Entity\TrackResponse\DeliveryDateTime();
        $deliveryDateTime->setType(new \Ups\Entity\TrackResponse\Type());
        $deliveryDateTime->setDate('TestString');

        $xml = $deliveryDateTime->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/DeliveryDateTime.xsd'));
    }
}
