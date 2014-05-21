<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ProductTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $product = new \Ups\Entity\TrackResponse\Product();
        $product->setDescription('TestString');

        $xml = $product->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/Product.xsd'));
    }
}
