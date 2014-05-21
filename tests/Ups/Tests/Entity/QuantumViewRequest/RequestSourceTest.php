<?php
namespace Ups\Tests\Entity\QuantumViewRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  RequestSourceTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $requestSource = new \Ups\Entity\QuantumViewRequest\RequestSource();
        $requestSource->setCode('TestString');
        $requestSource->setVersion('TestString');

        $xml = $requestSource->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewRequest/RequestSource.xsd'));
    }
}
