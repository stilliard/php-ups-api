<?php
namespace Ups\Entity;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class Manifest implements NodeInterface
{
    /**
     * @var \Ups\Entity\Shipper
     */
    private $shipper;

    /**
     * @var \Ups\Entity\ShipTo
     */
    private $shipTo;

    /**
     * @var array
     */
    private $referenceNumber;

    /**
     * @var \Ups\Entity\Service
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
     * @var \Ups\Entity\ShipmentServiceOptions
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
     * @var \Ups\Entity\CustomsValue
     */
    private $customsValue;

    /**
     * @var string
     */
    private $specialInstructions;

    /**
     * @var string
     */
    private $shipmentChargeType;

    /**
     * @var \Ups\Entity\BillToAccount
     */
    private $billToAccount;

    /**
     * @var string
     */
    private $consigneeBillIndicator;

    /**
     * @var string
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
    private $upsCarbonNeutral;

    /**
     * @var string
     */
    private $product;

    /**
     * @var string
     */
    private $upsReturnsExchange;

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
     * @var \Ups\Entity\UAPAddress
     */
    private $uapAddress;

    function __construct($attributes = null)
    {
        $this->setShipper(new Shipper());
        $this->setReferenceNumber(new ReferenceNumber());
        $this->setService(new Service());
        $this->setShipmentServiceOptions(new ShipmentServiceOptions());
        $this->setCustomsValue(new CustomsValue());
        $this->setBillToAccount(new BillToAccount());
        $this->setUapAddress(new UAPAddress());

        if (null !== $attributes) {
            if (isset($attributes->Shipper)) {
                $this->setShipper(new Shipper($attributes->Shipper));
            }
            if (isset($attributes->ShipTo)) {
                $this->setShipTo(new ShipTo($attributes->ShipTo));
            }
            if (isset($attributes->ReferenceNumber)) {
                $referenceNumber = $this->getReferenceNumber();
                if (is_array($attributes->ReferenceNumber)) {
                    foreach ($attributes->ReferenceNumber as $item) {
                        $referenceNumber[] = new ReferenceNumber($item);
                    }
                } else {
                    $referenceNumber[] = new ReferenceNumber($attributes->ReferenceNumber);
                }
                $this->setReferenceNumber($referenceNumber);
            }
            if (isset($attributes->Service)) {
                $this->Service = new Service($attributes->Service);
            }
            if (isset($attributes->PickupDate)) {
                $this->PickupDate = $attributes->PickupDate;
            }
            if (isset($attributes->ScheduledDeliveryDate)) {
                $this->ScheduledDeliveryDate = $attributes->ScheduledDeliveryDate;
            }
            if (isset($attributes->ScheduledDeliveryTime)) {
                $this->ScheduledDeliveryTime = $attributes->ScheduledDeliveryTime;
            }
            if (isset($attributes->DocumentsOnly)) {
                $this->DocumentsOnly = $attributes->DocumentsOnly;
            }
            if (isset($attributes->Package)) {
                $package = $this->getPackage();
                if (is_array($attributes->Package)) {
                    foreach ($attributes->Package as $item) {
                        $package[] = new Package($item);
                    }
                } else {
                    $package[] = new Package($attributes->Package);
                }
                $this->setPackage($package);
            }
            if (isset($attributes->ShipmentServiceOptions)) {
                $this->ShipmentServiceOptions = new ShipmentServiceOptions($attributes->ShipmentServiceOptions);
            }
            if (isset($attributes->ManufactureCountry)) {
                $this->ManufactureCountry = $attributes->ManufactureCountry;
            }
            if (isset($attributes->HarmonizedCode)) {
                $this->HarmonizedCode = $attributes->HarmonizedCode;
            }
            if (isset($attributes->CustomsValue)) {
                $this->CustomsValue = new CustomsValue($attributes->CustomsValue);
            }
            if (isset($attributes->SpecialInstructions)) {
                $this->SpecialInstructions = $attributes->SpecialInstructions;
            }
            if (isset($attributes->ShipmentChargeType)) {
                $this->ShipmentChargeType = $attributes->ShipmentChargeType;
            }
            if (isset($attributes->BillToAccount)) {
                $this->BillToAccount = new BillToAccount($attributes->BillToAccount);
            }
            if (isset($attributes->ConsigneeBillIndicator)) {
                $this->ConsigneeBillIndicator = $attributes->ConsigneeBillIndicator;
            }
            if (isset($attributes->CollectBillIndicator)) {
                $this->CollectBillIndicator = $attributes->CollectBillIndicator;
            }
            if (isset($attributes->LocationAssured)) {
                $this->LocationAssured = $attributes->LocationAssured;
            }
            if (isset($attributes->ImportControl)) {
                $this->ImportControl = $attributes->ImportControl;
            }
            if (isset($attributes->LabelDeliveryMethod)) {
                $this->LabelDeliveryMethod = $attributes->LabelDeliveryMethod;
            }
            if (isset($attributes->CommercialInvoiceRemoval)) {
                $this->CommercialInvoiceRemoval = $attributes->CommercialInvoiceRemoval;
            }
            if (isset($attributes->PostalServiceTrackingID)) {
                $this->PostalServiceTrackingID = $attributes->PostalServiceTrackingID;
            }
            if (isset($attributes->ReturnsFlexibleAccess)) {
                $this->ReturnsFlexibleAccess = $attributes->ReturnsFlexibleAccess;
            }
            if (isset($attributes->UPScarbonneutral)) {
                $this->UPScarbonneutral = $attributes->UPScarbonneutral;
            }
            if (isset($attributes->Product)) {
                $this->Product = $attributes->Product;
            }
            if (isset($attributes->UPSReturnsExchange)) {
                $this->UPSReturnsExchange = $attributes->UPSReturnsExchange;
            }
            if (isset($attributes->LiftGateOnDelivery)) {
                $this->LiftGateOnDelivery = $attributes->LiftGateOnDelivery;
            }
            if (isset($attributes->LiftGateOnPickUp)) {
                $this->LiftGateOnPickUp = $attributes->LiftGateOnPickUp;
            }
            if (isset($attributes->PickupPreference)) {
                $this->PickupPreference = $attributes->PickupPreference;
            }
            if (isset($attributes->DeliveryPreference)) {
                $this->DeliveryPreference = $attributes->DeliveryPreference;
            }
            if (isset($attributes->HoldForPickupAtUPSAccessPoint)) {
                $this->HoldForPickupAtUPSAccessPoint = $attributes->HoldForPickupAtUPSAccessPoint;
            }
            if (isset($attributes->UAPAddress)) {
                $this->UAPAddress = new Address($attributes->UAPAddress);
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
        if (count($this->getReferenceNumber()) > 0) {
            foreach ($this->getReferenceNumber() as $ReferenceNumber) {
                $node->appendChild($ReferenceNumber->toNode($document));
            }
        }
        $node->appendChild($this->getService()->toNode($document));
        $node->appendChild($document->createElement('PickupDate', $this->getPickupDate()));
        $node->appendChild($document->createElement('ScheduledDeliveryDate', $this->getScheduledDeliveryDate()));
        $node->appendChild($document->createElement('ScheduledDeliveryTime', $this->getScheduledDeliveryTime()));
        $node->appendChild($document->createElement('DocumentsOnly', $this->getDocumentsOnly()));
        if (count($this->getPackage()) > 0) {
            foreach ($this->getPackage() as $Package) {
                $node->appendChild($Package->toNode($document));
            }
        }
        $node->appendChild($this->getShipmentServiceOptions()->toNode($document));
        $node->appendChild($document->createElement('ManufactureCountry', $this->getManufactureCountry()));
        $node->appendChild($document->createElement('HarmonizedCode', $this->getHarmonizedCode()));
        $node->appendChild($this->getCustomsValue()->toNode($document));
        $node->appendChild($document->createElement('HarmonizedCode', $this->getHarmonizedCode()));
        $node->appendChild($document->createElement('SpecialInstructions', $this->getSpecialInstructions()));
        $node->appendChild($document->createElement('ShipmentChargeType', $this->getShipmentChargeType()));
        $node->appendChild($this->getBillToAccount()->toNode($document));
        $node->appendChild($document->createElement('ConsigneeBillIndicator', $this->getConsigneeBillIndicator()));
        $node->appendChild($document->createElement('CollectBillIndicator', $this->getCollectBillIndicator()));
        $node->appendChild($document->createElement('LocationAssured', $this->getLocationAssured()));
        $node->appendChild($document->createElement('ImportControl', $this->getImportControl()));
        $node->appendChild($document->createElement('LabelDeliveryMethod', $this->getLabelDeliveryMethod()));
        $node->appendChild($document->createElement('CommercialInvoiceRemoval', $this->getCommercialInvoiceRemoval()));
        $node->appendChild($document->createElement('PostalServiceTrackingID', $this->getPostalServiceTrackingID()));
        $node->appendChild($document->createElement('ReturnsFlexibleAccess', $this->getReturnsFlexibleAccess()));
        $node->appendChild($document->createElement('UPScarbonneutral', $this->getUpsCarbonNeutral()));
        $node->appendChild($document->createElement('Product', $this->getProduct()));
        $node->appendChild($document->createElement('UPSReturnsExchange', $this->getUpsReturnsExchange()));
        $node->appendChild($document->createElement('LiftGateOnDelivery', $this->getLiftGateOnDelivery()));
        $node->appendChild($document->createElement('LiftGateOnPickUp', $this->getLiftGateOnPickUp()));
        $node->appendChild($document->createElement('PickupPreference', $this->getPickupPreference()));
        $node->appendChild($document->createElement('DeliveryPreference', $this->getDeliveryPreference()));
        $node->appendChild($document->createElement('HoldForPickupAtUPSAccessPoint', $this->getHoldForPickupAtUPSAccessPoint()));
        $node->appendChild($this->getUapAddress()->toNode($document));

        return $node;
    }

    /**
     * @param \Ups\Entity\BillToAccount $billToAccount
     * @return $this
     */
    public function setBillToAccount($billToAccount)
    {
        $this->billToAccount = $billToAccount;
        return $this;
    }

    /**
     * @return \Ups\Entity\BillToAccount
     */
    public function getBillToAccount()
    {
        return $this->billToAccount;
    }

    /**
     * @param string $collectBillIndicator
     * @return $this
     */
    public function setCollectBillIndicator($collectBillIndicator)
    {
        $this->collectBillIndicator = $collectBillIndicator;
        return $this;
    }

    /**
     * @return string
     */
    public function getCollectBillIndicator()
    {
        return $this->collectBillIndicator;
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
     * @param string $consigneeBillIndicator
     * @return $this
     */
    public function setConsigneeBillIndicator($consigneeBillIndicator)
    {
        $this->consigneeBillIndicator = $consigneeBillIndicator;
        return $this;
    }

    /**
     * @return string
     */
    public function getConsigneeBillIndicator()
    {
        return $this->consigneeBillIndicator;
    }

    /**
     * @param \Ups\Entity\CustomsValue $customsValue
     * @return $this
     */
    public function setCustomsValue($customsValue)
    {
        $this->customsValue = $customsValue;
        return $this;
    }

    /**
     * @return \Ups\Entity\CustomsValue
     */
    public function getCustomsValue()
    {
        return $this->customsValue;
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
     * @param \Ups\Entity\Service $service
     * @return $this
     */
    public function setService($service)
    {
        $this->service = $service;
        return $this;
    }

    /**
     * @return \Ups\Entity\Service
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param \Ups\Entity\ShipTo $shipTo
     * @return $this
     */
    public function setShipTo($shipTo)
    {
        $this->shipTo = $shipTo;
        return $this;
    }

    /**
     * @return \Ups\Entity\ShipTo
     */
    public function getShipTo()
    {
        return $this->shipTo;
    }

    /**
     * @param string $shipmentChargeType
     * @return $this
     */
    public function setShipmentChargeType($shipmentChargeType)
    {
        $this->shipmentChargeType = $shipmentChargeType;
        return $this;
    }

    /**
     * @return string
     */
    public function getShipmentChargeType()
    {
        return $this->shipmentChargeType;
    }

    /**
     * @param \Ups\Entity\ShipmentServiceOptions $shipmentServiceOptions
     * @return $this
     */
    public function setShipmentServiceOptions($shipmentServiceOptions)
    {
        $this->shipmentServiceOptions = $shipmentServiceOptions;
        return $this;
    }

    /**
     * @return \Ups\Entity\ShipmentServiceOptions
     */
    public function getShipmentServiceOptions()
    {
        return $this->shipmentServiceOptions;
    }

    /**
     * @param \Ups\Entity\Shipper $shipper
     * @return $this
     */
    public function setShipper($shipper)
    {
        $this->shipper = $shipper;
        return $this;
    }

    /**
     * @return \Ups\Entity\Shipper
     */
    public function getShipper()
    {
        return $this->shipper;
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
     * @param \Ups\Entity\UAPAddress $uapAddress
     * @return $this
     */
    public function setUapAddress($uapAddress)
    {
        $this->uapAddress = $uapAddress;
        return $this;
    }

    /**
     * @return \Ups\Entity\UAPAddress
     */
    public function getUapAddress()
    {
        return $this->uapAddress;
    }

    /**
     * @param string $upsCarbonNeutral
     * @return $this
     */
    public function setUpsCarbonNeutral($upsCarbonNeutral)
    {
        $this->upsCarbonNeutral = $upsCarbonNeutral;
        return $this;
    }

    /**
     * @return string
     */
    public function getUpsCarbonNeutral()
    {
        return $this->upsCarbonNeutral;
    }

    /**
     * @param string $upsReturnsExchange
     * @return $this
     */
    public function setUpsReturnsExchange($upsReturnsExchange)
    {
        $this->upsReturnsExchange = $upsReturnsExchange;
        return $this;
    }

    /**
     * @return string
     */
    public function getUpsReturnsExchange()
    {
        return $this->upsReturnsExchange;
    }

}
