<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  AccessorialTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $accessorial = new \Ups\Entity\TrackResponse\Accessorial();
        $accessorial->setCode('TestString');
        $accessorial->setDescription('TestString');

        $xml = $accessorial->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/Accessorial.xsd'));
    }
}
