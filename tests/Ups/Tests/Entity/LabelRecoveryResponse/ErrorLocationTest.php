<?php
namespace Ups\Tests\Entity\LabelRecoveryResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  ErrorLocationTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $errorLocation = new \Ups\Entity\LabelRecoveryResponse\ErrorLocation();

        $xml = $errorLocation->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/LabelRecoveryResponse/ErrorLocation.xsd'));
    }
}
