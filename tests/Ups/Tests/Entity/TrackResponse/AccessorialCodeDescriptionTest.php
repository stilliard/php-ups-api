<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  AccessorialCodeDescriptionTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $accessorialCodeDescription = new \Ups\Entity\TrackResponse\AccessorialCodeDescription();
        $accessorialCodeDescription->setCode('TestString');
        $accessorialCodeDescription->setDescription('TestString');

        $xml = $accessorialCodeDescription->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/AccessorialCodeDescription.xsd'));
    }
}
