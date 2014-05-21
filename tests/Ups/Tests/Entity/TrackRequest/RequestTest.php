<?php
namespace Ups\Tests\Entity\TrackRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  RequestTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $request = new \Ups\Entity\TrackRequest\Request();
        $request->setTransactionReference(new \Ups\Entity\TrackRequest\TransactionReference());
        $request->setRequestAction('TestString');

        $xml = $request->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackRequest/Request.xsd'));
    }
}
