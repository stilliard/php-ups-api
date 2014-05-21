<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  CodeDescriptionTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $codeDescription = new \Ups\Entity\TrackResponse\CodeDescription();
        $codeDescription->setCode('TestString');

        $xml = $codeDescription->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/CodeDescription.xsd'));
    }
}
