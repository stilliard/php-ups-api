<?php
namespace Ups\Tests\Entity\LabelRecoveryResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  LabelRecoveryResponseTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $labelRecoveryResponse = new \Ups\Entity\LabelRecoveryResponse\LabelRecoveryResponse();
        $labelRecoveryResponse->setResponse(new \Ups\Entity\LabelRecoveryResponse\Response());
        $labelRecoveryResponse->setLabelResults(new \Ups\Entity\LabelRecoveryResponse\LabelResults());
        $labelRecoveryResponse->setTrackingCandidate(new \Ups\Entity\LabelRecoveryResponse\TrackingCandidate());

        $xml = $labelRecoveryResponse->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/LabelRecoveryResponse/LabelRecoveryResponse.xsd'));
    }
}
