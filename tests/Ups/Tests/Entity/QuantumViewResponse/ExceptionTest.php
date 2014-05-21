<?php
namespace Ups\Tests\Entity\QuantumViewResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ExceptionTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $exception = new \Ups\Entity\QuantumViewResponse\Exception();
        $exception->setShipperNumber('TestString');
        $exception->setTrackingNumber('TestString');
        $exception->setDate('TestString');
        $exception->setTime('TestString');

        $xml = $exception->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewResponse/Exception.xsd'));
    }
}
