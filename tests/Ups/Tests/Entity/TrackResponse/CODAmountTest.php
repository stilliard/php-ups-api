<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  CODAmountTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $cODAmount = new \Ups\Entity\TrackResponse\CODAmount();
        $cODAmount->setMonetaryValue('TestString');

        $xml = $cODAmount->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/CODAmount.xsd'));
    }
}
