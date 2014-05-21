<?php
namespace Ups\Tests\Entity\TrackRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  TransactionReferenceTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $transactionReference = new \Ups\Entity\TrackRequest\TransactionReference();

        $xml = $transactionReference->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackRequest/TransactionReference.xsd'));
    }
}
