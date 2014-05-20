<?php
namespace Ups\Tests\Entity\RateRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  RateInformationTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $rateInformation = new \Ups\Entity\RateRequest\RateInformation();

        $xml = $rateInformation->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateRequest/RateInformation.xsd'));
    }
}
