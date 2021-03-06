<?php
namespace Ups\Tests\Entity\QuantumViewResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ErrorTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $error = new \Ups\Entity\QuantumViewResponse\Error();
        $error->setErrorSeverity('TestString');
        $error->setErrorCode('TestString');

        $xml = $error->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewResponse/Error.xsd'));
    }
}
