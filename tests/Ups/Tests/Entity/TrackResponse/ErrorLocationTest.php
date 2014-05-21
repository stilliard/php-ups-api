<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ErrorLocationTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $errorLocation = new \Ups\Entity\TrackResponse\ErrorLocation();

        $xml = $errorLocation->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/ErrorLocation.xsd'));
    }
}
