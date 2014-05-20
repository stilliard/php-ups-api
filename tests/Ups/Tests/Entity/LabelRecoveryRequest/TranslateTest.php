<?php
namespace Ups\Tests\Entity\LabelRecoveryRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  TranslateTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $translate = new \Ups\Entity\LabelRecoveryRequest\Translate();
        $translate->setLanguageCode('TestString');

        $xml = $translate->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/LabelRecoveryRequest/Translate.xsd'));
    }
}
