<?php
namespace Ups\Tests\Entity\TimeInTransitResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  TransitFromListTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $transitFromList = new \Ups\Entity\TimeInTransitResponse\TransitFromList();
        $transitFromList->setCandidate(array(new \Ups\Entity\TimeInTransitResponse\Candidate()));

        $xml = $transitFromList->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TimeInTransitResponse/TransitFromList.xsd'));
    }
}
