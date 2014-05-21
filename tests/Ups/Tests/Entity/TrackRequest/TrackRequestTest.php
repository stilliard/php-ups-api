<?php
namespace Ups\Tests\Entity\TrackRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  TrackRequestTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $trackRequest = new \Ups\Entity\TrackRequest\TrackRequest();
        $trackRequest->setRequest(new \Ups\Entity\TrackRequest\Request());
        $trackRequest->setTrackingNumber('TestString');
        //$trackRequest->setShipmentIdentificationNumber('TestString');
        //$trackRequest->setCandidateBookmark('TestString');
        //$trackRequest->setReferenceNumber(new \Ups\Entity\TrackRequest\ReferenceNumber());

        $xml = $trackRequest->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackRequest/TrackRequest.xsd'));
    }
}
