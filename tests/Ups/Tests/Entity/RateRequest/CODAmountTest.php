<?php
namespace Ups\Tests\Entity\RateRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  CODAmountTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $cODAmount = new \Ups\Entity\RateRequest\CODAmount();
        $cODAmount->setMonetaryValue('TestString');

        $xml = $cODAmount->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateRequest/CODAmount.xsd'));
    }
}
