<?php
namespace Ups\Tests\Entity\QuantumViewResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  QuantumViewEventsTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $quantumViewEvents = new \Ups\Entity\QuantumViewResponse\QuantumViewEvents();
        $quantumViewEvents->setSubscriberID('TestString');
        $quantumViewEvents->setSubscriptionEvents(array(new \Ups\Entity\QuantumViewResponse\SubscriptionEvents()));

        $xml = $quantumViewEvents->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewResponse/QuantumViewEvents.xsd'));
    }
}
