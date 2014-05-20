<?php
namespace Ups\Tests\Entity\LabelRecoveryResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ImageTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $image = new \Ups\Entity\LabelRecoveryResponse\Image();

        $xml = $image->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/LabelRecoveryResponse/Image.xsd'));
    }
}
