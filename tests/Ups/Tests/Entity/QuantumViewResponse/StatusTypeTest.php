<?php
namespace Ups\Tests\Entity\QuantumViewResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  StatusTypeTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $statusType = new \Ups\Entity\QuantumViewResponse\StatusType();
        $statusType->setCode('TestString');
        $statusType->setDescription('TestString');

        $xml = $statusType->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewResponse/StatusType.xsd'));
    }
}
