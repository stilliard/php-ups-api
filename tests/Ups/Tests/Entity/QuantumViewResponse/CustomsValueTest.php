<?php
namespace Ups\Tests\Entity\QuantumViewResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  CustomsValueTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $customsValue = new \Ups\Entity\QuantumViewResponse\CustomsValue();
        $customsValue->setMonetaryValue('TestString');

        $xml = $customsValue->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewResponse/CustomsValue.xsd'));
    }
}
