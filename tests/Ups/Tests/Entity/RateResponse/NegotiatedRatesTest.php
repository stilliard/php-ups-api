<?php
namespace Ups\Tests\Entity\RateResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  NegotiatedRatesTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $negotiatedRates = new \Ups\Entity\RateResponse\NegotiatedRates();
        $negotiatedRates->setNetSummaryCharges(new \Ups\Entity\RateResponse\NetSummaryCharges());

        $xml = $negotiatedRates->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateResponse/NegotiatedRates.xsd'));
    }
}
