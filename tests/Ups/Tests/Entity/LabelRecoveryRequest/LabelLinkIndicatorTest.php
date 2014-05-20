<?php
namespace Ups\Tests\Entity\LabelRecoveryRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  LabelLinkIndicatorTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $labelLinkIndicator = new \Ups\Entity\LabelRecoveryRequest\LabelLinkIndicator();

        $xml = $labelLinkIndicator->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/LabelRecoveryRequest/LabelLinkIndicator.xsd'));
    }
}
