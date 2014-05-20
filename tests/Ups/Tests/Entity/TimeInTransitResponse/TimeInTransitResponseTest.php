<?php
namespace Ups\Tests\Entity\TimeInTransitResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  TimeInTransitResponseTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $timeInTransitResponse = new \Ups\Entity\TimeInTransitResponse\TimeInTransitResponse();
        $timeInTransitResponse->setResponse(new \Ups\Entity\TimeInTransitResponse\Response());

        $xml = $timeInTransitResponse->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TimeInTransitResponse/TimeInTransitResponse.xsd'));
    }
}
