<?php
namespace Ups\Tests\Entity\RateRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ReturnServiceTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $returnService = new \Ups\Entity\RateRequest\ReturnService();
        $returnService->setCode('TestString');

        $xml = $returnService->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateRequest/ReturnService.xsd'));
    }
}
