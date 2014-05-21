<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  StatusCodeTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $statusCode = new \Ups\Entity\TrackResponse\StatusCode();
        $statusCode->setCode('TestString');

        $xml = $statusCode->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/StatusCode.xsd'));
    }
}
