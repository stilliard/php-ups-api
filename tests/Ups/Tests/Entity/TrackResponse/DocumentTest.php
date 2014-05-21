<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  DocumentTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $document = new \Ups\Entity\TrackResponse\Document();
        $document->setType(new \Ups\Entity\TrackResponse\Type());
        $document->setGraphicImage('TestString');
        $document->setFormat(new \Ups\Entity\TrackResponse\Format());

        $xml = $document->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/Document.xsd'));
    }
}
