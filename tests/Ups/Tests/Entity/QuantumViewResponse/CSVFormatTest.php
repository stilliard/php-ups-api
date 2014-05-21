<?php
namespace Ups\Tests\Entity\QuantumViewResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  CSVFormatTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $cSVFormat = new \Ups\Entity\QuantumViewResponse\CSVFormat();
        $cSVFormat->setFile(array('TestString'));

        $xml = $cSVFormat->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewResponse/CSVFormat.xsd'));
    }
}
