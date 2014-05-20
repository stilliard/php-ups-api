<?php
namespace Ups\Tests\Entity\LabelRecoveryResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  LabelResultsTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $labelResults = new \Ups\Entity\LabelRecoveryResponse\LabelResults();
        $labelResults->setTrackingNumber('TestString');
        $labelResults->setLabelImage(new \Ups\Entity\LabelRecoveryResponse\LabelImage());

        $xml = $labelResults->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/LabelRecoveryResponse/LabelResults.xsd'));
    }
}
