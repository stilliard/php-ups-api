<?php
namespace Ups\Tests\Entity\QuantumViewResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  SubscriptionFileTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $subscriptionFile = new \Ups\Entity\QuantumViewResponse\SubscriptionFile();
        $subscriptionFile->setFileName('TestString');
        $subscriptionFile->setStatusType(new \Ups\Entity\QuantumViewResponse\StatusType());

        $xml = $subscriptionFile->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewResponse/SubscriptionFile.xsd'));
    }
}
