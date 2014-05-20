<?php
namespace Ups\Tests\Entity\RateResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  RatingServiceSelectionResponseTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $ratingServiceSelectionResponse = new \Ups\Entity\RateResponse\RatingServiceSelectionResponse();
        $ratingServiceSelectionResponse->setResponse(new \Ups\Entity\RateResponse\Response());
        $ratingServiceSelectionResponse->setRatedShipment(array(new \Ups\Entity\RateResponse\RatedShipment()));
        $ratingServiceSelectionResponse->getRatedShipment()[0]->setRatedPackage(array(new \Ups\Entity\RateResponse\RatedPackage()));

        $xml = $ratingServiceSelectionResponse->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateResponse/RatingServiceSelectionResponse.xsd'));
    }
}
