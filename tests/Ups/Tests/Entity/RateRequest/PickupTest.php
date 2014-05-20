<?php
namespace Ups\Tests\Entity\RateRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  PickupTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $pickup = new \Ups\Entity\RateRequest\Pickup();
        $pickup->setCode('TestString');

        $xml = $pickup->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateRequest/Pickup.xsd'));
    }
}
