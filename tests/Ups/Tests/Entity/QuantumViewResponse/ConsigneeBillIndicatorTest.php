<?php
namespace Ups\Tests\Entity\QuantumViewResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ConsigneeBillIndicatorTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $consigneeBillIndicator = new \Ups\Entity\QuantumViewResponse\ConsigneeBillIndicator();

        $xml = $consigneeBillIndicator->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewResponse/ConsigneeBillIndicator.xsd'));
    }
}
