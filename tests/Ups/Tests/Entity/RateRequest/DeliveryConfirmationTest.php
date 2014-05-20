<?php
namespace Ups\Tests\Entity\RateRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  DeliveryConfirmationTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $deliveryConfirmation = new \Ups\Entity\RateRequest\DeliveryConfirmation();
        $deliveryConfirmation->setDCIS('TestString');

        $xml = $deliveryConfirmation->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateRequest/DeliveryConfirmation.xsd'));
    }
}
