<?php
namespace Ups\Tests\Entity\RateRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  PhoneNumberTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $phoneNumber = new \Ups\Entity\RateRequest\PhoneNumber();

        $xml = $phoneNumber->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateRequest/PhoneNumber.xsd'));
    }
}
