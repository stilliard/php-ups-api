<?php
namespace Ups\Tests\Entity\TimeInTransitResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ResponseTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $response = new \Ups\Entity\TimeInTransitResponse\Response();
        $response->setResponseStatusCode('TestString');

        $xml = $response->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TimeInTransitResponse/Response.xsd'));
    }
}
