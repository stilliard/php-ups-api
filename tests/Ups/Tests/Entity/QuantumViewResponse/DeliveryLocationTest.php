<?php
namespace Ups\Tests\Entity\QuantumViewResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  DeliveryLocationTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $deliveryLocation = new \Ups\Entity\QuantumViewResponse\DeliveryLocation();
        $deliveryLocation->setAddressArtifactFormat(new \Ups\Entity\QuantumViewResponse\AddressArtifactFormat());

        $xml = $deliveryLocation->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewResponse/DeliveryLocation.xsd'));
    }
}
