<?php
namespace Ups\Tests\Entity\QuantumViewResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  SubscriptionEventsTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $subscriptionEvents = new \Ups\Entity\QuantumViewResponse\SubscriptionEvents();
        $subscriptionEvents->setName('TestString');
        $subscriptionEvents->setNumber('TestString');
        $subscriptionEvents->setSubscriptionStatus(new \Ups\Entity\QuantumViewResponse\SubscriptionStatus());

        $xml = $subscriptionEvents->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewResponse/SubscriptionEvents.xsd'));
    }
}
