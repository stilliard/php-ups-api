<?php
namespace Ups\Tests\Entity\LabelRecoveryResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ImageFormatTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $imageFormat = new \Ups\Entity\LabelRecoveryResponse\ImageFormat();
        $imageFormat->setCode('TestString');

        $xml = $imageFormat->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/LabelRecoveryResponse/ImageFormat.xsd'));
    }
}
