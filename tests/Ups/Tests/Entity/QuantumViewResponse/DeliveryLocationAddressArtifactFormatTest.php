<?php
namespace Ups\Tests\Entity\QuantumViewResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  DeliveryLocationAddressArtifactFormatTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $deliveryLocationAddressArtifactFormat = new \Ups\Entity\QuantumViewResponse\DeliveryLocationAddressArtifactFormat();

        $xml = $deliveryLocationAddressArtifactFormat->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewResponse/DeliveryLocationAddressArtifactFormat.xsd'));
    }
}
