<?php
namespace Ups\Tests\Entity\RateResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ServiceOptionsChargesTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $serviceOptionsCharges = new \Ups\Entity\RateResponse\ServiceOptionsCharges();
        $serviceOptionsCharges->setMonetaryValue('TestString');

        $xml = $serviceOptionsCharges->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateResponse/ServiceOptionsCharges.xsd'));
    }
}
