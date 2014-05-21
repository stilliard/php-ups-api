<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  PickUpServiceCenterTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $pickUpServiceCenter = new \Ups\Entity\TrackResponse\PickUpServiceCenter();
        $pickUpServiceCenter->setCity('TestString');
        $pickUpServiceCenter->setStateProvinceCode('TestString');

        $xml = $pickUpServiceCenter->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/PickUpServiceCenter.xsd'));
    }
}
