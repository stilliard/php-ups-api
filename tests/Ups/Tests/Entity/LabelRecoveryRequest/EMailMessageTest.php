<?php
namespace Ups\Tests\Entity\LabelRecoveryRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  EMailMessageTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $eMailMessage = new \Ups\Entity\LabelRecoveryRequest\EMailMessage();
        $eMailMessage->setEMailAddress('TestString');

        $xml = $eMailMessage->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/LabelRecoveryRequest/EMailMessage.xsd'));
    }
}
