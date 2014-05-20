<?php
namespace Ups\Tests\Entity\TimeInTransitResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  AddressArtifactFormatTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $addressArtifactFormat = new \Ups\Entity\TimeInTransitResponse\AddressArtifactFormat();

        $xml = $addressArtifactFormat->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TimeInTransitResponse/AddressArtifactFormat.xsd'));
    }
}
