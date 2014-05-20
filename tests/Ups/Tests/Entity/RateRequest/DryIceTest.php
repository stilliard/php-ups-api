<?php
namespace Ups\Tests\Entity\RateRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  DryIceTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $dryIce = new \Ups\Entity\RateRequest\DryIce();
        $dryIce->setRegulationSet('TestString');
        $dryIce->setDryIceWeight(new \Ups\Entity\RateRequest\DryIceWeight());

        $xml = $dryIce->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateRequest/DryIce.xsd'));
    }
}
