<?php
namespace Ups\Tests\Entity\LabelRecoveryResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  LabelImageFormatTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $labelImageFormat = new \Ups\Entity\LabelRecoveryResponse\LabelImageFormat();
        $labelImageFormat->setCode('TestString');

        $xml = $labelImageFormat->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/LabelRecoveryResponse/LabelImageFormat.xsd'));
    }
}
