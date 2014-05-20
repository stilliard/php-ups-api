<?php
namespace Ups\Tests\Entity\RateRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ImportControlTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $importControl = new \Ups\Entity\RateRequest\ImportControl();
        $importControl->setCode('TestString');

        $xml = $importControl->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateRequest/ImportControl.xsd'));
    }
}
