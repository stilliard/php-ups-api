<?php
namespace Ups\Tests\Entity\QuantumViewResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ActivityLocationTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $activityLocation = new \Ups\Entity\QuantumViewResponse\ActivityLocation();
        $activityLocation->setAddressArtifactFormat(new \Ups\Entity\QuantumViewResponse\AddressArtifactFormat());

        $xml = $activityLocation->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewResponse/ActivityLocation.xsd'));
    }
}
