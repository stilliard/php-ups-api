<?php
namespace Ups\Tests\Entity\RateRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  CodeTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $code = new \Ups\Entity\RateRequest\Code();
        $code->setCode('TestString');

        $xml = $code->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateRequest/Code.xsd'));
    }
}
