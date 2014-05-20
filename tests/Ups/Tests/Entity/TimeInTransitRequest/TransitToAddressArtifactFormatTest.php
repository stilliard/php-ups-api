<?php
namespace Ups\Tests\Entity\TimeInTransitRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  TransitToAddressArtifactFormatTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $transitToAddressArtifactFormat = new \Ups\Entity\TimeInTransitRequest\TransitToAddressArtifactFormat();

        $xml = $transitToAddressArtifactFormat->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TimeInTransitRequest/TransitToAddressArtifactFormat.xsd'));
    }
}
