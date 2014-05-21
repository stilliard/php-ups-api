<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  SignatureRequiredTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $signatureRequired = new \Ups\Entity\TrackResponse\SignatureRequired();
        $signatureRequired->setCode('TestString');

        $xml = $signatureRequired->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/SignatureRequired.xsd'));
    }
}
