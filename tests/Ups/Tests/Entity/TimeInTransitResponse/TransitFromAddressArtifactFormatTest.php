<?php
namespace Ups\Tests\Entity\TimeInTransitResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  TransitFromAddressArtifactFormatTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $transitFromAddressArtifactFormat = new \Ups\Entity\TimeInTransitResponse\TransitFromAddressArtifactFormat();

        $xml = $transitFromAddressArtifactFormat->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TimeInTransitResponse/TransitFromAddressArtifactFormat.xsd'));
    }
}
