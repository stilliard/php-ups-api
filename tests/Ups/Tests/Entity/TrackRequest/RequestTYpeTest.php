<?php
namespace Ups\Tests\Entity\TrackRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  RequestTYpeTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $requestTYpe = new \Ups\Entity\TrackRequest\RequestTYpe();
        $requestTYpe->setTransactionReference(new \Ups\Entity\TrackRequest\TransactionReference());
        $requestTYpe->setRequestAction('TestString');

        $xml = $requestTYpe->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackRequest/RequestTYpe.xsd'));
    }
}
