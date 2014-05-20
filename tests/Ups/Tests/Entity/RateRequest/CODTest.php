<?php
namespace Ups\Tests\Entity\RateRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  CODTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $cOD = new \Ups\Entity\RateRequest\COD();
        $cOD->setCODAmount(new \Ups\Entity\RateRequest\CODAmount());

        $xml = $cOD->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateRequest/COD.xsd'));
    }
}
