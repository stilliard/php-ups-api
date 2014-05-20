<?php
namespace Ups\Tests\Entity\RateRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  VerbalConfirmationTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $verbalConfirmation = new \Ups\Entity\RateRequest\VerbalConfirmation();

        $xml = $verbalConfirmation->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateRequest/VerbalConfirmation.xsd'));
    }
}
