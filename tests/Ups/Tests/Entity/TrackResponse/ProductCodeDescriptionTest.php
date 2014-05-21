<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ProductCodeDescriptionTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $productCodeDescription = new \Ups\Entity\TrackResponse\ProductCodeDescription();
        $productCodeDescription->setDescription('TestString');

        $xml = $productCodeDescription->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/ProductCodeDescription.xsd'));
    }
}
