<?php
namespace Ups\Tests\Entity\QuantumViewResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  CODTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $cOD = new \Ups\Entity\QuantumViewResponse\COD();

        $xml = $cOD->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewResponse/COD.xsd'));
    }
}
