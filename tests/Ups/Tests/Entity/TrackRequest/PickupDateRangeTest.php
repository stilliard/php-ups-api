<?php
namespace Ups\Tests\Entity\TrackRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  PickupDateRangeTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $pickupDateRange = new \Ups\Entity\TrackRequest\PickupDateRange();
        $pickupDateRange->setBeginDate('TestString');
        $pickupDateRange->setEndDate('TestString');

        $xml = $pickupDateRange->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackRequest/PickupDateRange.xsd'));
    }
}
