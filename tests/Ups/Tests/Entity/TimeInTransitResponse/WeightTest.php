<?php
namespace Ups\Tests\Entity\TimeInTransitResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  WeightTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $weight = new \Ups\Entity\TimeInTransitResponse\Weight();
        $weight->setWeight('TestString');

        $xml = $weight->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TimeInTransitResponse/Weight.xsd'));
    }
}
