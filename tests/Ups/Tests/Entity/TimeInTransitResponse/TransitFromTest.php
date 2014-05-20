<?php
namespace Ups\Tests\Entity\TimeInTransitResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  TransitFromTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $transitFrom = new \Ups\Entity\TimeInTransitResponse\TransitFrom();
        $transitFrom->setAddressArtifactFormat(new \Ups\Entity\TimeInTransitResponse\AddressArtifactFormat());

        $xml = $transitFrom->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TimeInTransitResponse/TransitFrom.xsd'));
    }
}
