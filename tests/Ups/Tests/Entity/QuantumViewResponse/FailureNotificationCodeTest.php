<?php
namespace Ups\Tests\Entity\QuantumViewResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  FailureNotificationCodeTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $failureNotificationCode = new \Ups\Entity\QuantumViewResponse\FailureNotificationCode();
        $failureNotificationCode->setCode('TestString');

        $xml = $failureNotificationCode->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewResponse/FailureNotificationCode.xsd'));
    }
}
