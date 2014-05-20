<?php
namespace Ups\Tests\Entity\LabelRecoveryRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  LabelRecoveryRequestTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $labelRecoveryRequest = new \Ups\Entity\LabelRecoveryRequest\LabelRecoveryRequest();
        $labelRecoveryRequest->setRequest(new \Ups\Entity\LabelRecoveryRequest\Request());
        $labelRecoveryRequest->setTrackingNumber('TestString');
        //$labelRecoveryRequest->setReferenceNumber(new \Ups\Entity\LabelRecoveryRequest\ReferenceNumber());
        //$labelRecoveryRequest->setShipperNumber('TestString');

        $xml = $labelRecoveryRequest->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/LabelRecoveryRequest/LabelRecoveryRequest.xsd'));
    }
}
