<?php
namespace Ups\Tests\Entity\QuantumViewResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  StatusTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $status = new \Ups\Entity\QuantumViewResponse\Status();
        $status->setCode('TestString');
        $status->setDescription('TestString');

        $xml = $status->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewResponse/Status.xsd'));
    }
}
