<?php
namespace Ups\Tests\Entity\TimeInTransitResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  GuaranteedTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $guaranteed = new \Ups\Entity\TimeInTransitResponse\Guaranteed();
        $guaranteed->setCode('TestString');

        $xml = $guaranteed->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TimeInTransitResponse/Guaranteed.xsd'));
    }
}
