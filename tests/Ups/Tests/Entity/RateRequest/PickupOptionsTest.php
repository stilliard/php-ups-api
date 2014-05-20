<?php
namespace Ups\Tests\Entity\RateRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  PickupOptionsTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $pickupOptions = new \Ups\Entity\RateRequest\PickupOptions();

        $xml = $pickupOptions->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateRequest/PickupOptions.xsd'));
    }
}
