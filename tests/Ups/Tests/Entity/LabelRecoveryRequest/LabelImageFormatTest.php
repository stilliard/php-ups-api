<?php
namespace Ups\Tests\Entity\LabelRecoveryRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  LabelImageFormatTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $labelImageFormat = new \Ups\Entity\LabelRecoveryRequest\LabelImageFormat();
        $labelImageFormat->setCode('TestString');

        $xml = $labelImageFormat->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/LabelRecoveryRequest/LabelImageFormat.xsd'));
    }
}
