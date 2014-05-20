<?php
namespace Ups\Tests\Entity\RateResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  TotalChargesTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $totalCharges = new \Ups\Entity\RateResponse\TotalCharges();
        $totalCharges->setMonetaryValue('TestString');

        $xml = $totalCharges->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateResponse/TotalCharges.xsd'));
    }
}
