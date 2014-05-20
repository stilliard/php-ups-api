<?php
namespace Ups\Tests\Entity\TimeInTransitResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  CandidateTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $candidate = new \Ups\Entity\TimeInTransitResponse\Candidate();
        $candidate->setAddressArtifactFormat(new \Ups\Entity\TimeInTransitResponse\AddressArtifactFormat());

        $xml = $candidate->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TimeInTransitResponse/Candidate.xsd'));
    }
}
