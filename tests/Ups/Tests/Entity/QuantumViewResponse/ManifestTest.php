<?php
namespace Ups\Tests\Entity\QuantumViewResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ManifestTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $manifest = new \Ups\Entity\QuantumViewResponse\Manifest();
        $manifest->setShipper(new \Ups\Entity\QuantumViewResponse\Shipper());
        $manifest->setShipTo(new \Ups\Entity\QuantumViewResponse\ShipTo());

        $xml = $manifest->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewResponse/Manifest.xsd'));
    }
}
