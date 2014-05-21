<?php
namespace Ups\Tests\Entity\QuantumViewResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  BillToAccountTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $billToAccount = new \Ups\Entity\QuantumViewResponse\BillToAccount();
        $billToAccount->setOption('TestString');
        $billToAccount->setNumber('TestString');

        $xml = $billToAccount->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/QuantumViewResponse/BillToAccount.xsd'));
    }
}
