<?php
namespace Ups\Tests\Entity\QuantumViewResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ResolutionTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $resolution = new \Ups\Entity\QuantumViewResponse\Resolution();
        $resolution->setCode('TestString');

        $xml = $resolution->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewResponse/Resolution.xsd'));
    }
}
