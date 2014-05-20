<?php
namespace Ups\Tests\Entity\RateResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  SurChargesTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $surCharges = new \Ups\Entity\RateResponse\SurCharges();
        $surCharges->setMonetaryValue('TestString');

        $xml = $surCharges->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateResponse/SurCharges.xsd'));
    }
}
