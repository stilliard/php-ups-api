<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ReturnToTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $returnTo = new \Ups\Entity\TrackResponse\ReturnTo();

        $xml = $returnTo->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/ReturnTo.xsd'));
    }
}
