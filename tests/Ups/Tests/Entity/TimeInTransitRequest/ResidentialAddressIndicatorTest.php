<?php
namespace Ups\Tests\Entity\TimeInTransitRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ResidentialAddressIndicatorTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $residentialAddressIndicator = new \Ups\Entity\TimeInTransitRequest\ResidentialAddressIndicator();

        $xml = $residentialAddressIndicator->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TimeInTransitRequest/ResidentialAddressIndicator.xsd'));
    }
}
