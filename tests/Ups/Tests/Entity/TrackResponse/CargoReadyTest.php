<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  CargoReadyTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $cargoReady = new \Ups\Entity\TrackResponse\CargoReady();
        $cargoReady->setDate('TestString');

        $xml = $cargoReady->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/CargoReady.xsd'));
    }
}
