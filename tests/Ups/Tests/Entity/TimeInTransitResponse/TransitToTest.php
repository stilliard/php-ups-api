<?php
namespace Ups\Tests\Entity\TimeInTransitResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  TransitToTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $transitTo = new \Ups\Entity\TimeInTransitResponse\TransitTo();
        $transitTo->setAddressArtifactFormat(new \Ups\Entity\TimeInTransitResponse\AddressArtifactFormat());

        $xml = $transitTo->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TimeInTransitResponse/TransitTo.xsd'));
    }
}
