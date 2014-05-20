<?php
namespace Ups\Tests\Entity\RateResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  RatedPackageTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $ratedPackage = new \Ups\Entity\RateResponse\RatedPackage();
        $ratedPackage->setTotalCharges(new \Ups\Entity\RateResponse\TotalCharges());

        $xml = $ratedPackage->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateResponse/RatedPackage.xsd'));
    }
}
