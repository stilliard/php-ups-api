<?php
namespace Ups\Tests\Entity\RateRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  CustomerClassificationTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $customerClassification = new \Ups\Entity\RateRequest\CustomerClassification();
        $customerClassification->setCode('TestString');

        $xml = $customerClassification->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateRequest/CustomerClassification.xsd'));
    }
}
