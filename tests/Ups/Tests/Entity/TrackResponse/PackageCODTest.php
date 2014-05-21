<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  PackageCODTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $packageCOD = new \Ups\Entity\TrackResponse\PackageCOD();

        $xml = $packageCOD->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/PackageCOD.xsd'));
    }
}
