<?php
namespace Ups\Tests\Entity\QuantumViewResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ServiceTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $service = new \Ups\Entity\QuantumViewResponse\Service();
        $service->setCode('TestString');

        $xml = $service->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewResponse/Service.xsd'));
    }
}
