<?php
namespace Ups\Tests\Entity\RateRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ExtendedFlexibleParcelIndicatorTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $extendedFlexibleParcelIndicator = new \Ups\Entity\RateRequest\ExtendedFlexibleParcelIndicator();
        $extendedFlexibleParcelIndicator->setCurrencyCode('TestString');
        $extendedFlexibleParcelIndicator->setMonetaryValue('TestString');

        $xml = $extendedFlexibleParcelIndicator->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateRequest/ExtendedFlexibleParcelIndicator.xsd'));
    }
}
