<?php
namespace Ups\Tests\Entity\RateResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  GrandTotalTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $grandTotal = new \Ups\Entity\RateResponse\GrandTotal();
        $grandTotal->setMonetaryValue('TestString');

        $xml = $grandTotal->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateResponse/GrandTotal.xsd'));
    }
}
