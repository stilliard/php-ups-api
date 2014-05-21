<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  TypeTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $type = new \Ups\Entity\TrackResponse\Type();
        $type->setCode('TestString');

        $xml = $type->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/Type.xsd'));
    }
}
