<?php
namespace Ups\Tests\Entity\LabelRecoveryResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  LabelImageTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $labelImage = new \Ups\Entity\LabelRecoveryResponse\LabelImage();
        $labelImage->setLabelImageFormat(new \Ups\Entity\LabelRecoveryResponse\LabelImageFormat());
        $labelImage->setGraphicImage('TestString');

        $xml = $labelImage->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/LabelRecoveryResponse/LabelImage.xsd'));
    }
}
