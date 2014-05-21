<?php
namespace Ups\Tests\Entity\QuantumViewRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  QuantumViewRequestTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $quantumViewRequest = new \Ups\Entity\QuantumViewRequest\QuantumViewRequest();
        $quantumViewRequest->setRequest(new \Ups\Entity\QuantumViewRequest\Request());

        $xml = $quantumViewRequest->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewRequest/QuantumViewRequest.xsd'));
    }
}
