<?php
namespace Ups\Tests\Entity\RateResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ChargesTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $charges = new \Ups\Entity\RateResponse\Charges();
        $charges->setMonetaryValue('TestString');

        $xml = $charges->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateResponse/Charges.xsd'));
    }
}
