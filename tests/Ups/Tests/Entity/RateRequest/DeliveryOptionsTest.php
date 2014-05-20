<?php
namespace Ups\Tests\Entity\RateRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  DeliveryOptionsTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $deliveryOptions = new \Ups\Entity\RateRequest\DeliveryOptions();

        $xml = $deliveryOptions->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateRequest/DeliveryOptions.xsd'));
    }
}
