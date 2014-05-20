<?php
namespace Ups\Tests\Entity\RateResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  NetSummaryChargesTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $netSummaryCharges = new \Ups\Entity\RateResponse\NetSummaryCharges();
        $netSummaryCharges->setGrandTotal(new \Ups\Entity\RateResponse\GrandTotal());

        $xml = $netSummaryCharges->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateResponse/NetSummaryCharges.xsd'));
    }
}
