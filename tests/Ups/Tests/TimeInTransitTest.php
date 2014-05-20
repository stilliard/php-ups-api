<?php
namespace Ups\Tests;

use Ups;
use Exception;
use PHPUnit_Framework_TestCase;
use Ups\Entity\Address;
use Ups\Entity\Charges;
use Ups\Entity\ShipmentWeight;
use Ups\Entity\TimeInTransitRequest;
use Ups\Entity\UnitOfMeasurement;

/**
 * TimeInTransit Class Tests
 *
 * @package ups
 * @group TimeInTransit
 */
class TimeInTransitTest extends PHPUnit_Framework_TestCase
{
    public function testTimeInTransit()
    {
        /*
        $shipperAddress = new Address();
        $shipperAddress->AddressLine1 = 'Route de trois Lucs';
        $shipperAddress->PoliticalDivision1 = 'Marseille';
        $shipperAddress->PostcodePrimaryLow = '13011';
        $shipperAddress->CountryCode = 'FR';

        $shipAddress = new Address();
        $shipAddress->AddressLine1 = 'Rue de la Granière';
        $shipAddress->PoliticalDivision1 = 'Marseille';
        $shipAddress->PostcodePrimaryLow = '13011';
        $shipAddress->CountryCode = 'FR';

        $unitOfMeasurement = new UnitOfMeasurement();
        $unitOfMeasurement->Code = $unitOfMeasurement::UOM_KGS; //'KGS';

        $shipmentWeight = new ShipmentWeight();
        $shipmentWeight->Weight = 3.6;
        $shipmentWeight->UnitOfMeasurement = $unitOfMeasurement;

        $invoiceLineTotal = new Charges();
        $invoiceLineTotal->CurrencyCode = 'EUR';
        $invoiceLineTotal->MonetaryValue = 99.99;

        $shipment = new TimeInTransitRequest();
        $shipment->TransitTo = $shipAddress;
        $shipment->TransitFrom = $shipperAddress;
        $shipment->ShipmentWeight = $shipmentWeight;
        $shipment->TotalPackagesInShipment = 2;
        $shipment->InvoiceLineTotal = $invoiceLineTotal;
        $shipment->PickupDate = "20140512";
*/
        //$timeInTransit = new Ups\TimeInTransit();
        //$timeInTransit->setRequest(new \Ups\Request('/TimeInTransit/Response1.xml'));
        //$timeInTransit->setContext('unit test');
        //$response = $timeInTransit->getTimeInTransit($timeInTransit->getRequest());
        //$request = $timeInTransit->getRequest()->toNode();
        //print_r($request);
        // Test response
        //$this->assertInstanceOf('Ups\Request', $request);
    }

}