<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  AddressArtifactTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $addressArtifact = new \Ups\Entity\TrackResponse\AddressArtifact();

        $xml = $addressArtifact->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/AddressArtifact.xsd'));
    }
}
