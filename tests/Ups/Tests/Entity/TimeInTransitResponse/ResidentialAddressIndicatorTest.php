<?php
namespace Ups\Tests\Entity\TimeInTransitResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ResidentialAddressIndicatorTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $residentialAddressIndicator = new \Ups\Entity\TimeInTransitResponse\ResidentialAddressIndicator();

        $xml = $residentialAddressIndicator->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TimeInTransitResponse/ResidentialAddressIndicator.xsd'));
    }
}
