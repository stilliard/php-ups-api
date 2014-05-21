<?php
namespace Ups\Entity\QuantumViewResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  Manifest implements NodeInterface
{
    /**
     * @var \Ups\Entity\QuantumViewResponse\Shipper
     */
    private $shipper;

    /**
     * @var \Ups\Entity\QuantumViewResponse\ShipTo
     */
    private $shipTo;

    /**
     * @var array
     */
    private $referenceNumber;

    /**
     * @var \Ups\Entity\QuantumViewResponse\Service
     */
    private $service;

    /**
     * @var string
     */
    private $pickupDate;

    /**
     * @var string
     */
    private $scheduledDeliveryDate;

    /**
     * @var string
     */
    private $scheduledDeliveryTime;

    /**
     * @var string
     */
    private $documentsOnly;

    /**
     * @var array
     */
    private $package;

    /**
     * @var \Ups\Entity\QuantumViewResponse\ShipmentServiceOptions
     */
    private $shipmentServiceOptions;

    /**
     * @var string
     */
    private $manufactureCountry;

    /**
     * @var string
     */
    private $harmonizedCode;

    /**
     * @var \Ups\Entity\QuantumViewResponse\CustomsValue
     */
    private $customsValue;

    /**
     * @var string
     */
    private $specialInstructions;

    /**
     * @var string
     */
    private $shipmentCharge;

    /**
     * @var \Ups\Entity\QuantumViewResponse\BillToAccount
     */
    private $billToAccount;

    /**
     * @var \Ups\Entity\QuantumViewResponse\ConsigneeBillIndicator
     */
    private $consigneeBillIndicator;

    /**
     * @var \Ups\Entity\QuantumViewResponse\CollectBillIndicator
     */
    private $collectBillIndicator;

    /**
     * @var string
     */
    private $locationAssured;

    /**
     * @var string
     */
    private $importControl;

    /**
     * @var string
     */
    private $labelDeliveryMethod;

    /**
     * @var string
     */
    private $commercialInvoiceRemoval;

    /**
     * @var string
     */
    private $postalServiceTrackingID;

    /**
     * @var string
     */
    private $returnsFlexibleAccess;

    /**
     * @var string
     */
    private $uPScarbonneutral;

    /**
     * @var string
     */
    private $product;

    /**
     * @var string
     */
    private $uPSReturnsExchange;

    /**
     * @var string
     */
    private $liftGateOnDelivery;

    /**
     * @var string
     */
    private $liftGateOnPickUp;

    /**
     * @var string
     */
    private $pickupPreference;

    /**
     * @var string
     */
    private $deliveryPreference;

    /**
     * @var string
     */
    private $holdForPickupAtUPSAccessPoint;

    /**
     * @var \Ups\Entity\QuantumViewResponse\UAPAddress
     */
    private $uAPAddress;

    function __construct($attributes = null)
    {
        $this->setShipper(new Shipper());
        $this->setShipTo(new ShipTo());

        if (null !== $attributes) {
            if (isset($attributes->Shipper)) {
                $this->setShipper(new Shipper($attributes->Shipper));
            }
            if (isset($attributes->ShipTo)) {
                $this->setShipTo(new ShipTo($attributes->ShipTo));
            }
            if (isset($attributes->ReferenceNumber)) {
                $referenceNumber = $this->getReferenceNumber();
                foreach ($attributes->ReferenceNumber as $item) {
                    $referenceNumber[] = new ReferenceNumber($item);
                }
                $this->setReferenceNumber($referenceNumber);
            }
            if (isset($attributes->Service)) {
                $this->setService(new Service($attributes->Service));
            }
            if (isset($attributes->PickupDate)) {
                $this->setPickupDate($attributes->PickupDate);
            }
            if (isset($attributes->ScheduledDeliveryDate)) {
                $this->setScheduledDeliveryDate($attributes->ScheduledDeliveryDate);
            }
            if (isset($attributes->ScheduledDeliveryTime)) {
                $this->setScheduledDeliveryTime($attributes->ScheduledDeliveryTime);
            }
            if (isset($attributes->DocumentsOnly)) {
                $this->setDocumentsOnly($attributes->DocumentsOnly);
            }
            if (isset($attributes->Package)) {
                $package = $this->getPackage();
                foreach ($attributes->Package as $item) {
                    $package[] = new Package($item);
                }
                $this->setPackage($package);
            }
            if (isset($attributes->ShipmentServiceOptions)) {
                $this->setShipmentServiceOptions(new ShipmentServiceOptions($attributes->ShipmentServiceOptions));
            }
            if (isset($attributes->ManufactureCountry)) {
                $this->setManufactureCountry($attributes->ManufactureCountry);
            }
            if (isset($attributes->HarmonizedCode)) {
                $this->setHarmonizedCode($attributes->HarmonizedCode);
            }
            if (isset($attributes->CustomsValue)) {
                $this->setCustomsValue(new CustomsValue($attributes->CustomsValue));
            }
            if (isset($attributes->SpecialInstructions)) {
                $this->setSpecialInstructions($attributes->SpecialInstructions);
            }
            if (isset($attributes->ShipmentCharge)) {
                $this->setShipmentCharge($attributes->ShipmentCharge);
            }
            if (isset($attributes->BillToAccount)) {
                $this->setBillToAccount(new BillToAccount($attributes->BillToAccount));
            }
            if (isset($attributes->ConsigneeBillIndicator)) {
                $this->setConsigneeBillIndicator(new ConsigneeBillIndicator($attributes->ConsigneeBillIndicator));
            }
            if (isset($attributes->CollectBillIndicator)) {
                $this->setCollectBillIndicator(new CollectBillIndicator($attributes->CollectBillIndicator));
            }
            if (isset($attributes->LocationAssured)) {
                $this->setLocationAssured($attributes->LocationAssured);
            }
            if (isset($attributes->ImportControl)) {
                $this->setImportControl($attributes->ImportControl);
            }
            if (isset($attributes->LabelDeliveryMethod)) {
                $this->setLabelDeliveryMethod($attributes->LabelDeliveryMethod);
            }
            if (isset($attributes->CommercialInvoiceRemoval)) {
                $this->setCommercialInvoiceRemoval($attributes->CommercialInvoiceRemoval);
            }
            if (isset($attributes->PostalServiceTrackingID)) {
                $this->setPostalServiceTrackingID($attributes->PostalServiceTrackingID);
            }
            if (isset($attributes->ReturnsFlexibleAccess)) {
                $this->setReturnsFlexibleAccess($attributes->ReturnsFlexibleAccess);
            }
            if (isset($attributes->UPScarbonneutral)) {
                $this->setUPScarbonneutral($attributes->UPScarbonneutral);
            }
            if (isset($attributes->Product)) {
                $this->setProduct($attributes->Product);
            }
            if (isset($attributes->UPSReturnsExchange)) {
                $this->setUPSReturnsExchange($attributes->UPSReturnsExchange);
            }
            if (isset($attributes->LiftGateOnDelivery)) {
                $this->setLiftGateOnDelivery($attributes->LiftGateOnDelivery);
            }
            if (isset($attributes->LiftGateOnPickUp)) {
                $this->setLiftGateOnPickUp($attributes->LiftGateOnPickUp);
            }
            if (isset($attributes->PickupPreference)) {
                $this->setPickupPreference($attributes->PickupPreference);
            }
            if (isset($attributes->DeliveryPreference)) {
                $this->setDeliveryPreference($attributes->DeliveryPreference);
            }
            if (isset($attributes->HoldForPickupAtUPSAccessPoint)) {
                $this->setHoldForPickupAtUPSAccessPoint($attributes->HoldForPickupAtUPSAccessPoint);
            }
            if (isset($attributes->UAPAddress)) {
                $this->setUAPAddress(new UAPAddress($attributes->UAPAddress));
            }
        }
    }

    /**
     * @param null|DOMDocument $document
     * @return DOMNode
     */
    public function toNode(DOMDocument $document = null)
    {
        if (null === $document) {
            $document = new DOMDocument();
        }

        $node = $document->createElement('Manifest');
        $node->appendChild($this->getShipper()->toNode($document));
        $node->appendChild($this->getShipTo()->toNode($document));
        if (null !== $this->getReferenceNumber()) {
            if (count($this->getReferenceNumber()) > 0) {
                foreach ($this->getReferenceNumber() as $ReferenceNumber) {
                    $node->appendChild($ReferenceNumber->toNode($document));
                }
            }
        }
        if (null !== $this->getService()) {
            $node->appendChild($this->getService()->toNode($document));
        }
        if (null !== $this->getPickupDate()) {
            $node->appendChild($document->createElement('PickupDate', $this->getPickupDate()));
        }
        if (null !== $this->getScheduledDeliveryDate()) {
            $node->appendChild($document->createElement('ScheduledDeliveryDate', $this->getScheduledDeliveryDate()));
        }
        if (null !== $this->getScheduledDeliveryTime()) {
            $node->appendChild($document->createElement('ScheduledDeliveryTime', $this->getScheduledDeliveryTime()));
        }
        if (null !== $this->getDocumentsOnly()) {
            $node->appendChild($document->createElement('DocumentsOnly', $this->getDocumentsOnly()));
        }
        if (null !== $this->getPackage()) {
            if (count($this->getPackage()) > 0) {
                foreach ($this->getPackage() as $Package) {
                    $node->appendChild($Package->toNode($document));
                }
            }
        }
        if (null !== $this->getShipmentServiceOptions()) {
            $node->appendChild($this->getShipmentServiceOptions()->toNode($document));
        }
        if (null !== $this->getManufactureCountry()) {
            $node->appendChild($document->createElement('ManufactureCountry', $this->getManufactureCountry()));
        }
        if (null !== $this->getHarmonizedCode()) {
            $node->appendChild($document->createElement('HarmonizedCode', $this->getHarmonizedCode()));
        }
        if (null !== $this->getCustomsValue()) {
            $node->appendChild($this->getCustomsValue()->toNode($document));
        }
        if (null !== $this->getSpecialInstructions()) {
            $node->appendChild($document->createElement('SpecialInstructions', $this->getSpecialInstructions()));
        }
        if (null !== $this->getShipmentCharge()) {
            $node->appendChild($document->createElement('ShipmentCharge', $this->getShipmentCharge()));
        }
        if (null !== $this->getBillToAccount()) {
            $node->appendChild($this->getBillToAccount()->toNode($document));
        }
        if (null !== $this->getConsigneeBillIndicator()) {
            $node->appendChild($this->getConsigneeBillIndicator()->toNode($document));
        }
        if (null !== $this->getCollectBillIndicator()) {
            $node->appendChild($this->getCollectBillIndicator()->toNode($document));
        }
        if (null !== $this->getLocationAssured()) {
            $node->appendChild($document->createElement('LocationAssured', $this->getLocationAssured()));
        }
        if (null !== $this->getImportControl()) {
            $node->appendChild($document->createElement('ImportControl', $this->getImportControl()));
        }
        if (null !== $this->getLabelDeliveryMethod()) {
            $node->appendChild($document->createElement('LabelDeliveryMethod', $this->getLabelDeliveryMethod()));
        }
        if (null !== $this->getCommercialInvoiceRemoval()) {
            $node->appendChild($document->createElement('CommercialInvoiceRemoval', $this->getCommercialInvoiceRemoval()));
        }
        if (null !== $this->getPostalServiceTrackingID()) {
            $node->appendChild($document->createElement('PostalServiceTrackingID', $this->getPostalServiceTrackingID()));
        }
        if (null !== $this->getReturnsFlexibleAccess()) {
            $node->appendChild($document->createElement('ReturnsFlexibleAccess', $this->getReturnsFlexibleAccess()));
        }
        if (null !== $this->getUPScarbonneutral()) {
            $node->appendChild($document->createElement('UPScarbonneutral', $this->getUPScarbonneutral()));
        }
        if (null !== $this->getProduct()) {
            $node->appendChild($document->createElement('Product', $this->getProduct()));
        }
        if (null !== $this->getUPSReturnsExchange()) {
            $node->appendChild($document->createElement('UPSReturnsExchange', $this->getUPSReturnsExchange()));
        }
        if (null !== $this->getLiftGateOnDelivery()) {
            $node->appendChild($document->createElement('LiftGateOnDelivery', $this->getLiftGateOnDelivery()));
        }
        if (null !== $this->getLiftGateOnPickUp()) {
            $node->appendChild($document->createElement('LiftGateOnPickUp', $this->getLiftGateOnPickUp()));
        }
        if (null !== $this->getPickupPreference()) {
            $node->appendChild($document->createElement('PickupPreference', $this->getPickupPreference()));
        }
        if (null !== $this->getDeliveryPreference()) {
            $node->appendChild($document->createElement('DeliveryPreference', $this->getDeliveryPreference()));
        }
        if (null !== $this->getHoldForPickupAtUPSAccessPoint()) {
            $node->appendChild($document->createElement('HoldForPickupAtUPSAccessPoint', $this->getHoldForPickupAtUPSAccessPoint()));
        }
        if (null !== $this->getUAPAddress()) {
            $node->appendChild($this->getUAPAddress()->toNode($document));
        }
        return $node;
    }

    /**
     * @param \Ups\Entity\QuantumViewResponse\Shipper $shipper
     * @return $this
     */
    public function setShipper($shipper)
    {
        $this->shipper = $shipper;
        return $this;
    }

    /**
     * @return \Ups\Entity\QuantumViewResponse\Shipper
     */
    public function getShipper()
    {
        return $this->shipper;
    }

    /**
     * @param \Ups\Entity\QuantumViewResponse\ShipTo $shipTo
     * @return $this
     */
    public function setShipTo($shipTo)
    {
        $this->shipTo = $shipTo;
        return $this;
    }

    /**
     * @return \Ups\Entity\QuantumViewResponse\ShipTo
     */
    public function getShipTo()
    {
        return $this->shipTo;
    }

    /**
     * @param array $referenceNumber
     * @return $this
     */
    public function setReferenceNumber($referenceNumber)
    {
        $this->referenceNumber = $referenceNumber;
        return $this;
    }

    /**
     * @return array
     */
    public function getReferenceNumber()
    {
        return $this->referenceNumber;
    }

    /**
     * @param \Ups\Entity\QuantumViewResponse\Service $service
     * @return $this
     */
    public function setService($service)
    {
        $this->service = $service;
        return $this;
    }

    /**
     * @return \Ups\Entity\QuantumViewResponse\Service
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param string $pickupDate
     * @return $this
     */
    public function setPickupDate($pickupDate)
    {
        $this->pickupDate = $pickupDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getPickupDate()
    {
        return $this->pickupDate;
    }

    /**
     * @param string $scheduledDeliveryDate
     * @return $this
     */
    public function setScheduledDeliveryDate($scheduledDeliveryDate)
    {
        $this->scheduledDeliveryDate = $scheduledDeliveryDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getScheduledDeliveryDate()
    {
        return $this->scheduledDeliveryDate;
    }

    /**
     * @param string $scheduledDeliveryTime
     * @return $this
     */
    public function setScheduledDeliveryTime($scheduledDeliveryTime)
    {
        $this->scheduledDeliveryTime = $scheduledDeliveryTime;
        return $this;
    }

    /**
     * @return string
     */
    public function getScheduledDeliveryTime()
    {
        return $this->scheduledDeliveryTime;
    }

    /**
     * @param string $documentsOnly
     * @return $this
     */
    public function setDocumentsOnly($documentsOnly)
    {
        $this->documentsOnly = $documentsOnly;
        return $this;
    }

    /**
     * @return string
     */
    public function getDocumentsOnly()
    {
        return $this->documentsOnly;
    }

    /**
     * @param array $package
     * @return $this
     */
    public function setPackage($package)
    {
        $this->package = $package;
        return $this;
    }

    /**
     * @return array
     */
    public function getPackage()
    {
        return $this->package;
    }

    /**
     * @param \Ups\Entity\QuantumViewResponse\ShipmentServiceOptions $shipmentServiceOptions
     * @return $this
     */
    public function setShipmentServiceOptions($shipmentServiceOptions)
    {
        $this->shipmentServiceOptions = $shipmentServiceOptions;
        return $this;
    }

    /**
     * @return \Ups\Entity\QuantumViewResponse\ShipmentServiceOptions
     */
    public function getShipmentServiceOptions()
    {
        return $this->shipmentServiceOptions;
    }

    /**
     * @param string $manufactureCountry
     * @return $this
     */
    public function setManufactureCountry($manufactureCountry)
    {
        $this->manufactureCountry = $manufactureCountry;
        return $this;
    }

    /**
     * @return string
     */
    public function getManufactureCountry()
    {
        return $this->manufactureCountry;
    }

    /**
     * @param string $harmonizedCode
     * @return $this
     */
    public function setHarmonizedCode($harmonizedCode)
    {
        $this->harmonizedCode = $harmonizedCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getHarmonizedCode()
    {
        return $this->harmonizedCode;
    }

    /**
     * @param \Ups\Entity\QuantumViewResponse\CustomsValue $customsValue
     * @return $this
     */
    public function setCustomsValue($customsValue)
    {
        $this->customsValue = $customsValue;
        return $this;
    }

    /**
     * @return \Ups\Entity\QuantumViewResponse\CustomsValue
     */
    public function getCustomsValue()
    {
        return $this->customsValue;
    }

    /**
     * @param string $specialInstructions
     * @return $this
     */
    public function setSpecialInstructions($specialInstructions)
    {
        $this->specialInstructions = $specialInstructions;
        return $this;
    }

    /**
     * @return string
     */
    public function getSpecialInstructions()
    {
        return $this->specialInstructions;
    }

    /**
     * @param string $shipmentCharge
     * @return $this
     */
    public function setShipmentCharge($shipmentCharge)
    {
        $this->shipmentCharge = $shipmentCharge;
        return $this;
    }

    /**
     * @return string
     */
    public function getShipmentCharge()
    {
        return $this->shipmentCharge;
    }

    /**
     * @param \Ups\Entity\QuantumViewResponse\BillToAccount $billToAccount
     * @return $this
     */
    public function setBillToAccount($billToAccount)
    {
        $this->billToAccount = $billToAccount;
        return $this;
    }

    /**
     * @return \Ups\Entity\QuantumViewResponse\BillToAccount
     */
    public function getBillToAccount()
    {
        return $this->billToAccount;
    }

    /**
     * @param \Ups\Entity\QuantumViewResponse\ConsigneeBillIndicator $consigneeBillIndicator
     * @return $this
     */
    public function setConsigneeBillIndicator($consigneeBillIndicator)
    {
        $this->consigneeBillIndicator = $consigneeBillIndicator;
        return $this;
    }

    /**
     * @return \Ups\Entity\QuantumViewResponse\ConsigneeBillIndicator
     */
    public function getConsigneeBillIndicator()
    {
        return $this->consigneeBillIndicator;
    }

    /**
     * @param \Ups\Entity\QuantumViewResponse\CollectBillIndicator $collectBillIndicator
     * @return $this
     */
    public function setCollectBillIndicator($collectBillIndicator)
    {
        $this->collectBillIndicator = $collectBillIndicator;
        return $this;
    }

    /**
     * @return \Ups\Entity\QuantumViewResponse\CollectBillIndicator
     */
    public function getCollectBillIndicator()
    {
        return $this->collectBillIndicator;
    }

    /**
     * @param string $locationAssured
     * @return $this
     */
    public function setLocationAssured($locationAssured)
    {
        $this->locationAssured = $locationAssured;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocationAssured()
    {
        return $this->locationAssured;
    }

    /**
     * @param string $importControl
     * @return $this
     */
    public function setImportControl($importControl)
    {
        $this->importControl = $importControl;
        return $this;
    }

    /**
     * @return string
     */
    public function getImportControl()
    {
        return $this->importControl;
    }

    /**
     * @param string $labelDeliveryMethod
     * @return $this
     */
    public function setLabelDeliveryMethod($labelDeliveryMethod)
    {
        $this->labelDeliveryMethod = $labelDeliveryMethod;
        return $this;
    }

    /**
     * @return string
     */
    public function getLabelDeliveryMethod()
    {
        return $this->labelDeliveryMethod;
    }

    /**
     * @param string $commercialInvoiceRemoval
     * @return $this
     */
    public function setCommercialInvoiceRemoval($commercialInvoiceRemoval)
    {
        $this->commercialInvoiceRemoval = $commercialInvoiceRemoval;
        return $this;
    }

    /**
     * @return string
     */
    public function getCommercialInvoiceRemoval()
    {
        return $this->commercialInvoiceRemoval;
    }

    /**
     * @param string $postalServiceTrackingID
     * @return $this
     */
    public function setPostalServiceTrackingID($postalServiceTrackingID)
    {
        $this->postalServiceTrackingID = $postalServiceTrackingID;
        return $this;
    }

    /**
     * @return string
     */
    public function getPostalServiceTrackingID()
    {
        return $this->postalServiceTrackingID;
    }

    /**
     * @param string $returnsFlexibleAccess
     * @return $this
     */
    public function setReturnsFlexibleAccess($returnsFlexibleAccess)
    {
        $this->returnsFlexibleAccess = $returnsFlexibleAccess;
        return $this;
    }

    /**
     * @return string
     */
    public function getReturnsFlexibleAccess()
    {
        return $this->returnsFlexibleAccess;
    }

    /**
     * @param string $uPScarbonneutral
     * @return $this
     */
    public function setUPScarbonneutral($uPScarbonneutral)
    {
        $this->uPScarbonneutral = $uPScarbonneutral;
        return $this;
    }

    /**
     * @return string
     */
    public function getUPScarbonneutral()
    {
        return $this->uPScarbonneutral;
    }

    /**
     * @param string $product
     * @return $this
     */
    public function setProduct($product)
    {
        $this->product = $product;
        return $this;
    }

    /**
     * @return string
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param string $uPSReturnsExchange
     * @return $this
     */
    public function setUPSReturnsExchange($uPSReturnsExchange)
    {
        $this->uPSReturnsExchange = $uPSReturnsExchange;
        return $this;
    }

    /**
     * @return string
     */
    public function getUPSReturnsExchange()
    {
        return $this->uPSReturnsExchange;
    }

    /**
     * @param string $liftGateOnDelivery
     * @return $this
     */
    public function setLiftGateOnDelivery($liftGateOnDelivery)
    {
        $this->liftGateOnDelivery = $liftGateOnDelivery;
        return $this;
    }

    /**
     * @return string
     */
    public function getLiftGateOnDelivery()
    {
        return $this->liftGateOnDelivery;
    }

    /**
     * @param string $liftGateOnPickUp
     * @return $this
     */
    public function setLiftGateOnPickUp($liftGateOnPickUp)
    {
        $this->liftGateOnPickUp = $liftGateOnPickUp;
        return $this;
    }

    /**
     * @return string
     */
    public function getLiftGateOnPickUp()
    {
        return $this->liftGateOnPickUp;
    }

    /**
     * @param string $pickupPreference
     * @return $this
     */
    public function setPickupPreference($pickupPreference)
    {
        $this->pickupPreference = $pickupPreference;
        return $this;
    }

    /**
     * @return string
     */
    public function getPickupPreference()
    {
        return $this->pickupPreference;
    }

    /**
     * @param string $deliveryPreference
     * @return $this
     */
    public function setDeliveryPreference($deliveryPreference)
    {
        $this->deliveryPreference = $deliveryPreference;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryPreference()
    {
        return $this->deliveryPreference;
    }

    /**
     * @param string $holdForPickupAtUPSAccessPoint
     * @return $this
     */
    public function setHoldForPickupAtUPSAccessPoint($holdForPickupAtUPSAccessPoint)
    {
        $this->holdForPickupAtUPSAccessPoint = $holdForPickupAtUPSAccessPoint;
        return $this;
    }

    /**
     * @return string
     */
    public function getHoldForPickupAtUPSAccessPoint()
    {
        return $this->holdForPickupAtUPSAccessPoint;
    }

    /**
     * @param \Ups\Entity\QuantumViewResponse\UAPAddress $uAPAddress
     * @return $this
     */
    public function setUAPAddress($uAPAddress)
    {
        $this->uAPAddress = $uAPAddress;
        return $this;
    }

    /**
     * @return \Ups\Entity\QuantumViewResponse\UAPAddress
     */
    public function getUAPAddress()
    {
        return $this->uAPAddress;
    }

}
