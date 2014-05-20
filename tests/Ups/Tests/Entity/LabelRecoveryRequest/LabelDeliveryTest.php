<?php
namespace Ups\Tests\Entity\LabelRecoveryRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  LabelDeliveryTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $labelDelivery = new \Ups\Entity\LabelRecoveryRequest\LabelDelivery();

        $xml = $labelDelivery->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/LabelRecoveryRequest/LabelDelivery.xsd'));
    }
}
