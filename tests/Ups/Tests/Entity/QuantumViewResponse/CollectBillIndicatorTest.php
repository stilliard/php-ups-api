<?php
namespace Ups\Tests\Entity\QuantumViewResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  CollectBillIndicatorTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $collectBillIndicator = new \Ups\Entity\QuantumViewResponse\CollectBillIndicator();

        $xml = $collectBillIndicator->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewResponse/CollectBillIndicator.xsd'));
    }
}
