<?php
namespace Ups\Tests\Entity\LabelRecoveryResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ReceiptTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $receipt = new \Ups\Entity\LabelRecoveryResponse\Receipt();

        $xml = $receipt->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/LabelRecoveryResponse/Receipt.xsd'));
    }
}
