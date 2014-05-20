<?php
namespace Ups\Tests\Entity\TimeInTransitResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  InvoiceLineTotalTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $invoiceLineTotal = new \Ups\Entity\TimeInTransitResponse\InvoiceLineTotal();
        $invoiceLineTotal->setMonetaryValue('TestString');

        $xml = $invoiceLineTotal->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TimeInTransitResponse/InvoiceLineTotal.xsd'));
    }
}
