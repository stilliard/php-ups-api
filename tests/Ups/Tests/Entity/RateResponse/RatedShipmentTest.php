<?php
namespace Ups\Tests\Entity\RateResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  RatedShipmentTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $ratedShipment = new \Ups\Entity\RateResponse\RatedShipment();
        $ratedShipment->setService(new \Ups\Entity\RateResponse\Service());
        $ratedShipment->setBillingWeight(new \Ups\Entity\RateResponse\BillingWeight());
        $ratedShipment->setTransportationCharges(new \Ups\Entity\RateResponse\TransportationCharges());
        $ratedShipment->setServiceOptionsCharges(new \Ups\Entity\RateResponse\ServiceOptionsCharges());
        $ratedShipment->setTotalCharges(new \Ups\Entity\RateResponse\TotalCharges());
        $ratedShipment->setGuaranteedDaysToDelivery('TestString');
        $ratedShipment->setScheduledDeliveryTime('TestString');
        $ratedShipment->setRatedPackage(array(new \Ups\Entity\RateResponse\RatedPackage()));

        $xml = $ratedShipment->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateResponse/RatedShipment.xsd'));
    }
}
