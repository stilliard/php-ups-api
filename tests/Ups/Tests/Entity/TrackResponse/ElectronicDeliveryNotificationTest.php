<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ElectronicDeliveryNotificationTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $electronicDeliveryNotification = new \Ups\Entity\TrackResponse\ElectronicDeliveryNotification();
        $electronicDeliveryNotification->setName('TestString');

        $xml = $electronicDeliveryNotification->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/ElectronicDeliveryNotification.xsd'));
    }
}
