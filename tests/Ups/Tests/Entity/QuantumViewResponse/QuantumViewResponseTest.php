<?php
namespace Ups\Tests\Entity\QuantumViewResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  QuantumViewResponseTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $quantumViewResponse = new \Ups\Entity\QuantumViewResponse\QuantumViewResponse();
        $quantumViewResponse->setResponse(new \Ups\Entity\QuantumViewResponse\Response());

        $xml = $quantumViewResponse->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewResponse/QuantumViewResponse.xsd'));
    }
}
