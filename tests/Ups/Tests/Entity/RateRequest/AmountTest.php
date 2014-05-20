<?php
namespace Ups\Tests\Entity\RateRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  AmountTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $amount = new \Ups\Entity\RateRequest\Amount();
        $amount->setMonetaryValue('TestString');

        $xml = $amount->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateRequest/Amount.xsd'));
    }
}
