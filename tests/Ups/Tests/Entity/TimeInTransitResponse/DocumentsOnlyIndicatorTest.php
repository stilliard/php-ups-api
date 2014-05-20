<?php
namespace Ups\Tests\Entity\TimeInTransitResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  DocumentsOnlyIndicatorTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $documentsOnlyIndicator = new \Ups\Entity\TimeInTransitResponse\DocumentsOnlyIndicator();

        $xml = $documentsOnlyIndicator->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TimeInTransitResponse/DocumentsOnlyIndicator.xsd'));
    }
}
