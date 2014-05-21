<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  InquiryNumberTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $inquiryNumber = new \Ups\Entity\TrackResponse\InquiryNumber();
        $inquiryNumber->setCode('TestString');
        $inquiryNumber->setDescription('TestString');
        $inquiryNumber->setValue('TestString');

        $xml = $inquiryNumber->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/InquiryNumber.xsd'));
    }
}
