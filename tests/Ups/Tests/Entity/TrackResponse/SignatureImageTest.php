<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  SignatureImageTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $signatureImage = new \Ups\Entity\TrackResponse\SignatureImage();
        $signatureImage->setGraphicImage('TestString');
        $signatureImage->setImageFormat(new \Ups\Entity\TrackResponse\ImageFormat());

        $xml = $signatureImage->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/SignatureImage.xsd'));
    }
}
