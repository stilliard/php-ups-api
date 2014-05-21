<?php
namespace Ups\Tests\Entity\QuantumViewResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  CallTagARSTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $callTagARS = new \Ups\Entity\QuantumViewResponse\CallTagARS();

        $xml = $callTagARS->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewResponse/CallTagARS.xsd'));
    }
}
