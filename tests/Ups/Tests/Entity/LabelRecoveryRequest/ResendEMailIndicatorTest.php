<?php
namespace Ups\Tests\Entity\LabelRecoveryRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ResendEMailIndicatorTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $resendEMailIndicator = new \Ups\Entity\LabelRecoveryRequest\ResendEMailIndicator();

        $xml = $resendEMailIndicator->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/LabelRecoveryRequest/ResendEMailIndicator.xsd'));
    }
}
