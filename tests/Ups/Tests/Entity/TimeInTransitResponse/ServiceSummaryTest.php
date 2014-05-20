<?php
namespace Ups\Tests\Entity\TimeInTransitResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ServiceSummaryTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $serviceSummary = new \Ups\Entity\TimeInTransitResponse\ServiceSummary();
        $serviceSummary->setService(new \Ups\Entity\TimeInTransitResponse\Service());
        $serviceSummary->setEstimatedArrival(new \Ups\Entity\TimeInTransitResponse\EstimatedArrival());

        $xml = $serviceSummary->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TimeInTransitResponse/ServiceSummary.xsd'));
    }
}
