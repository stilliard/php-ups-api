<?php
namespace Ups\Tests\Entity\RateResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  TransportationChargesTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $transportationCharges = new \Ups\Entity\RateResponse\TransportationCharges();
        $transportationCharges->setMonetaryValue('TestString');

        $xml = $transportationCharges->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateResponse/TransportationCharges.xsd'));
    }
}
