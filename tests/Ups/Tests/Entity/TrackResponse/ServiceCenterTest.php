<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ServiceCenterTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $serviceCenter = new \Ups\Entity\TrackResponse\ServiceCenter();
        $serviceCenter->setCity('TestString');
        $serviceCenter->setStateProvinceCode('TestString');

        $xml = $serviceCenter->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/ServiceCenter.xsd'));
    }
}
