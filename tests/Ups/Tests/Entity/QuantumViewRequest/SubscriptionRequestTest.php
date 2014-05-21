<?php
namespace Ups\Tests\Entity\QuantumViewRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  SubscriptionRequestTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $subscriptionRequest = new \Ups\Entity\QuantumViewRequest\SubscriptionRequest();

        $xml = $subscriptionRequest->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewRequest/SubscriptionRequest.xsd'));
    }
}
