<?php
namespace Ups\Tests\Entity\RateResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  BillingWeightTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $billingWeight = new \Ups\Entity\RateResponse\BillingWeight();
        $billingWeight->setUnitOfMeasurement(new \Ups\Entity\RateResponse\UnitOfMeasurement());
        $billingWeight->setWeight('TestString');

        $xml = $billingWeight->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateResponse/BillingWeight.xsd'));
    }
}
