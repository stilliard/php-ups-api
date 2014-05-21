<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  MessageTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $message = new \Ups\Entity\TrackResponse\Message();

        $xml = $message->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/Message.xsd'));
    }
}
