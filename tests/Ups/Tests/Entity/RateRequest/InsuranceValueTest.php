<?php
namespace Ups\Tests\Entity\RateRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  InsuranceValueTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $insuranceValue = new \Ups\Entity\RateRequest\InsuranceValue();
        $insuranceValue->setCurrencyCode('TestString');
        $insuranceValue->setMonetaryValue('TestString');

        $xml = $insuranceValue->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateRequest/InsuranceValue.xsd'));
    }
}
