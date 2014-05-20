<?php
namespace Ups\Tests\Entity\RateRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  BasicFlexibleParcelIndicatorTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $basicFlexibleParcelIndicator = new \Ups\Entity\RateRequest\BasicFlexibleParcelIndicator();
        $basicFlexibleParcelIndicator->setCurrencyCode('TestString');
        $basicFlexibleParcelIndicator->setMonetaryValue('TestString');

        $xml = $basicFlexibleParcelIndicator->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateRequest/BasicFlexibleParcelIndicator.xsd'));
    }
}
