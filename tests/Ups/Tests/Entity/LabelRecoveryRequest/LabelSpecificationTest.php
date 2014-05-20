<?php
namespace Ups\Tests\Entity\LabelRecoveryRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  LabelSpecificationTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $labelSpecification = new \Ups\Entity\LabelRecoveryRequest\LabelSpecification();
        $labelSpecification->setLabelImageFormat(new \Ups\Entity\LabelRecoveryRequest\LabelImageFormat());

        $xml = $labelSpecification->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/LabelRecoveryRequest/LabelSpecification.xsd'));
    }
}
