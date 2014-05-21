<?php
namespace Ups\Tests\Entity\QuantumViewResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  FlatFileFormatTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $flatFileFormat = new \Ups\Entity\QuantumViewResponse\FlatFileFormat();
        $flatFileFormat->setFile(array('TestString'));

        $xml = $flatFileFormat->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewResponse/FlatFileFormat.xsd'));
    }
}
