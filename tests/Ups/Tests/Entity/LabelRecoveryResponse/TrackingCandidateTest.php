<?php
namespace Ups\Tests\Entity\LabelRecoveryResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  TrackingCandidateTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $trackingCandidate = new \Ups\Entity\LabelRecoveryResponse\TrackingCandidate();
        $trackingCandidate->setTrackingNumber('TestString');

        $xml = $trackingCandidate->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/LabelRecoveryResponse/TrackingCandidate.xsd'));
    }
}
