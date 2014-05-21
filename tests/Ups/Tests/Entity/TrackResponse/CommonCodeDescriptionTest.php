<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  CommonCodeDescriptionTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $commonCodeDescription = new \Ups\Entity\TrackResponse\CommonCodeDescription();
        $commonCodeDescription->setCode('TestString');

        $xml = $commonCodeDescription->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/CommonCodeDescription.xsd'));
    }
}
