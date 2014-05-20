<?php
namespace Ups\Tests\Entity\TimeInTransitResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  TransitToListTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $transitToList = new \Ups\Entity\TimeInTransitResponse\TransitToList();
        $transitToList->setCandidate(array(new \Ups\Entity\TimeInTransitResponse\Candidate()));

        $xml = $transitToList->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TimeInTransitResponse/TransitToList.xsd'));
    }
}
