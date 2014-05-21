<?php
namespace Ups\Tests\Entity\QuantumViewRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  DateTimeRangeTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $dateTimeRange = new \Ups\Entity\QuantumViewRequest\DateTimeRange();
        $dateTimeRange->setBeginDateTime('TestString');

        $xml = $dateTimeRange->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewRequest/DateTimeRange.xsd'));
    }
}
