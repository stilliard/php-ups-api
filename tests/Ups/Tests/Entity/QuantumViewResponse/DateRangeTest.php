<?php
namespace Ups\Tests\Entity\QuantumViewResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  DateRangeTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $dateRange = new \Ups\Entity\QuantumViewResponse\DateRange();
        $dateRange->setBeginDate('TestString');

        $xml = $dateRange->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewResponse/DateRange.xsd'));
    }
}
