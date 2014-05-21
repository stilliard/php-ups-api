<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  CodeNoDescriptionTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $codeNoDescription = new \Ups\Entity\TrackResponse\CodeNoDescription();
        $codeNoDescription->setCode('TestString');

        $xml = $codeNoDescription->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/CodeNoDescription.xsd'));
    }
}
