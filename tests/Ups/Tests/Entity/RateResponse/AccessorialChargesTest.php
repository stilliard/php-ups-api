<?php
namespace Ups\Tests\Entity\RateResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  AccessorialChargesTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $accessorialCharges = new \Ups\Entity\RateResponse\AccessorialCharges();
        $accessorialCharges->setMonetaryValue('TestString');

        $xml = $accessorialCharges->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateResponse/AccessorialCharges.xsd'));
    }
}
