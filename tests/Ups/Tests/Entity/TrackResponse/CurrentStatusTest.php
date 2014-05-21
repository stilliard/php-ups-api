<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  CurrentStatusTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $currentStatus = new \Ups\Entity\TrackResponse\CurrentStatus();
        $currentStatus->setCode('TestString');
        $currentStatus->setDescription('TestString');

        $xml = $currentStatus->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/CurrentStatus.xsd'));
    }
}
