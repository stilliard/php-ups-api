<?php
namespace Ups\Tests\Entity\QuantumViewResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  GenericActivityTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $genericActivity = new \Ups\Entity\QuantumViewResponse\GenericActivity();

        $xml = $genericActivity->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewResponse/GenericActivity.xsd'));
    }
}
