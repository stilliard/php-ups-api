<?php
namespace Ups\Tests\Entity\TimeInTransitRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  TransitFromTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $transitFrom = new \Ups\Entity\TimeInTransitRequest\TransitFrom();
        $transitFrom->setAddressArtifactFormat(new \Ups\Entity\TimeInTransitRequest\AddressArtifactFormat());

        $xml = $transitFrom->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TimeInTransitRequest/TransitFrom.xsd'));
    }
}
