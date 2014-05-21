<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  PODLetterTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $pODLetter = new \Ups\Entity\TrackResponse\PODLetter();

        $xml = $pODLetter->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/PODLetter.xsd'));
    }
}
