<?php
namespace Ups\Tests\Entity\RateRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  StructuredPhoneNumberTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $structuredPhoneNumber = new \Ups\Entity\RateRequest\StructuredPhoneNumber();
        $structuredPhoneNumber->setPhoneDialPlanNumber('TestString');
        $structuredPhoneNumber->setPhoneLineNumber('TestString');

        $xml = $structuredPhoneNumber->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateRequest/StructuredPhoneNumber.xsd'));
    }
}
