<?php
namespace Ups\Tests\Entity\RateRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  TimeInTransitFlexibleParcelIndicatorTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $timeInTransitFlexibleParcelIndicator = new \Ups\Entity\RateRequest\TimeInTransitFlexibleParcelIndicator();
        $timeInTransitFlexibleParcelIndicator->setCurrencyCode('TestString');
        $timeInTransitFlexibleParcelIndicator->setMonetaryValue('TestString');

        $xml = $timeInTransitFlexibleParcelIndicator->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateRequest/TimeInTransitFlexibleParcelIndicator.xsd'));
    }
}
