<?php
namespace Ups\Tests\Entity\RateResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  AccessorialTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $accessorial = new \Ups\Entity\RateResponse\Accessorial();
        $accessorial->setCode('TestString');

        $xml = $accessorial->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateResponse/Accessorial.xsd'));
    }
}
