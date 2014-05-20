<?php
namespace Ups\Tests\Entity\RateRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  RequestTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $request = new \Ups\Entity\RateRequest\Request();
        $request->setRequestAction('TestString');

        $xml = $request->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateRequest/Request.xsd'));
    }
}
