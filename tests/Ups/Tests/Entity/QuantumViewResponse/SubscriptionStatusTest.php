<?php
namespace Ups\Tests\Entity\QuantumViewResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  SubscriptionStatusTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $subscriptionStatus = new \Ups\Entity\QuantumViewResponse\SubscriptionStatus();
        $subscriptionStatus->setCode('TestString');

        $xml = $subscriptionStatus->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewResponse/SubscriptionStatus.xsd'));
    }
}
