<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  AppointmentTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $appointment = new \Ups\Entity\TrackResponse\Appointment();

        $xml = $appointment->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/Appointment.xsd'));
    }
}
