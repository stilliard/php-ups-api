<?php
namespace Ups\Tests\Entity\TimeInTransitResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  EstimatedArrivalTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $estimatedArrival = new \Ups\Entity\TimeInTransitResponse\EstimatedArrival();
        $estimatedArrival->setDayOfWeek('TestString');
        $estimatedArrival->setTime('TestString');
        $estimatedArrival->setDate('TestString');
        $estimatedArrival->setPickupDate('TestString');
        $estimatedArrival->setPickupTime('TestString');
        $estimatedArrival->setBusinessTransitDays('TestString');

        $xml = $estimatedArrival->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TimeInTransitResponse/EstimatedArrival.xsd'));
    }
}
