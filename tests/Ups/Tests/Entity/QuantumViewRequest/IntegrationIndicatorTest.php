<?php
namespace Ups\Tests\Entity\QuantumViewRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  IntegrationIndicatorTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $integrationIndicator = new \Ups\Entity\QuantumViewRequest\IntegrationIndicator();

        $xml = $integrationIndicator->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewRequest/IntegrationIndicator.xsd'));
    }
}
