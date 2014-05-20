<?php
namespace Ups\Tests\Entity\RateRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  InsuredValueTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $insuredValue = new \Ups\Entity\RateRequest\InsuredValue();
        $insuredValue->setMonetaryValue('TestString');

        $xml = $insuredValue->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateRequest/InsuredValue.xsd'));
    }
}
