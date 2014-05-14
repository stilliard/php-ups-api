<?php
namespace Ups\Entity;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class Delivery implements NodeInterface
{
    /**
     * @var array
     */
    private $packageReferenceNumber;

    /**
     * @var array
     */
    private $shipmentReferenceNumber;

    /**
     * @var string
     */
    private $trackingNumber;

    /**
     * @var string
     */
    private $shipperNumber;

    /**
     * @var string
     */
    private $date;

    /**
     * @var string
     */
    private $time;

    /**
     * @var string
     */
    private $driverRelease;

    /**
     * @var \Ups\Entity\ActivityLocation
     */
    private $activityLocation;

    /**
     * @var \Ups\Entity\DeliveryLocation
     */
    private $deliveryLocation;

    /**
     * @var \Ups\Entity\COD
     */
    private $cod;

    /**
     * @var \Ups\Entity\BillToAccount
     */
    private $billToAccount;

    function __construct($attributes = null)
    {
        $this->setShipmentReferenceNumber(array());
        $this->setPackageReferenceNumber(array());
        $this->setActivityLocation(new ActivityLocation());
        $this->setDeliveryLocation(new DeliveryLocation());
        $this->setCod(new COD());
        $this->setBillToAccount(new BillToAccount());

        if (null !== $attributes) {
            if (isset($attributes->PackageReferenceNumber)) {
                $PackageReferenceNumber = $this->getPackageReferenceNumber();
                if (is_array($attributes->PackageReferenceNumber)) {
                    foreach ($attributes->PackageReferenceNumber as $PkgReferenceNumber) {
                        $PackageReferenceNumber[] = new PackageReferenceNumber($PkgReferenceNumber);
                    }
                } else {
                    $PackageReferenceNumber[] = new PackageReferenceNumber($attributes->PackageReferenceNumber);
                }
                $this->setPackageReferenceNumber($PackageReferenceNumber);
            }
            if (isset($attributes->ShipmentReferenceNumber)) {
                $ShipmentReferenceNumber = $this->getShipmentReferenceNumber();
                if (is_array($attributes->ShipmentReferenceNumber)) {
                    foreach ($attributes->ShipmentReferenceNumber as $ShpReferenceNumber) {
                        $ShipmentReferenceNumber[] = new ShipmentReferenceNumber($ShpReferenceNumber);
                    }
                } else {
                    $ShipmentReferenceNumber[] = new ShipmentReferenceNumber($attributes->ShipmentReferenceNumber);
                }
                $this->setShipmentReferenceNumber($ShipmentReferenceNumber);
            }
            if (isset($attributes->TrackingNumber)) {
                $this->setTrackingNumber($attributes->TrackingNumber);
            }
            if (isset($attributes->ShipperNumber)) {
                $this->setShipperNumber($attributes->ShipperNumber);
            }
            if (isset($attributes->Date)) {
                $this->setDate($attributes->Date);
            }
            if (isset($attributes->Time)) {
                $this->setTime($attributes->Time);
            }
            if (isset($attributes->DriverRelease)) {
                $this->setDriverRelease($attributes->DriverRelease);
            }
            if (isset($attributes->ActivityLocation)) {
                $this->setActivityLocation(new ActivityLocation($attributes->ActivityLocation));
            }
            if (isset($attributes->DeliveryLocation)) {
                $this->setDeliveryLocation(new DeliveryLocation($attributes->DeliveryLocation));
            }
            if (isset($attributes->COD)) {
                $this->setCod(new COD($attributes->COD));
            }
            if (isset($attributes->BillToAccount)) {
                $this->setBillToAccount(new BillToAccount($attributes->BillToAccount));
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

        $node = $document->createElement('Delivery');
        if (count($this->getPackageReferenceNumber()) > 0) {
            foreach ($this->getPackageReferenceNumber() as $PackageReferenceNumber) {
                $node->appendChild($PackageReferenceNumber->toNode($document));
            }
        }
        if (count($this->getShipmentReferenceNumber()) > 0) {
            foreach ($this->getShipmentReferenceNumber() as $ShipmentReferenceNumber) {
                $node->appendChild($ShipmentReferenceNumber->toNode($document));
            }
        }
        $node->appendChild($document->createElement('TrackingNumber', $this->getTrackingNumber()));
        $node->appendChild($document->createElement('ShipperNumber', $this->getShipperNumber()));
        $node->appendChild($document->createElement('Date', $this->getDate()));
        $node->appendChild($document->createElement('Time', $this->getTime()));
        $node->appendChild($document->createElement('DriverRelease', $this->getDriverRelease()));
        $node->appendChild($this->getActivityLocation()->toNode($document));
        $node->appendChild($this->getDeliveryLocation()->toNode($document));
        $node->appendChild($this->getCod()->toNode($document));
        $node->appendChild($this->getBillToAccount()->toNode($document));

        return $node;
    }

    /**
     * @param \Ups\Entity\ActivityLocation $activityLocation
     * @return $this
     */
    public function setActivityLocation($activityLocation)
    {
        $this->activityLocation = $activityLocation;
        return $this;
    }

    /**
     * @return \Ups\Entity\ActivityLocation
     */
    public function getActivityLocation()
    {
        return $this->activityLocation;
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
     * @param \Ups\Entity\COD $cod
     * @return $this
     */
    public function setCod($cod)
    {
        $this->cod = $cod;
        return $this;
    }

    /**
     * @return \Ups\Entity\COD
     */
    public function getCod()
    {
        return $this->cod;
    }

    /**
     * @param string $date
     * @return $this
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \Ups\Entity\DeliveryLocation $deliveryLocation
     * @return $this
     */
    public function setDeliveryLocation($deliveryLocation)
    {
        $this->deliveryLocation = $deliveryLocation;
        return $this;
    }

    /**
     * @return \Ups\Entity\DeliveryLocation
     */
    public function getDeliveryLocation()
    {
        return $this->deliveryLocation;
    }

    /**
     * @param string $driverRelease
     * @return $this
     */
    public function setDriverRelease($driverRelease)
    {
        $this->driverRelease = $driverRelease;
        return $this;
    }

    /**
     * @return string
     */
    public function getDriverRelease()
    {
        return $this->driverRelease;
    }

    /**
     * @param array $packageReferenceNumber
     * @return $this
     */
    public function setPackageReferenceNumber($packageReferenceNumber)
    {
        $this->packageReferenceNumber = $packageReferenceNumber;
        return $this;
    }

    /**
     * @return array
     */
    public function getPackageReferenceNumber()
    {
        return $this->packageReferenceNumber;
    }

    /**
     * @param array $shipmentReferenceNumber
     * @return $this
     */
    public function setShipmentReferenceNumber($shipmentReferenceNumber)
    {
        $this->shipmentReferenceNumber = $shipmentReferenceNumber;
        return $this;
    }

    /**
     * @return array
     */
    public function getShipmentReferenceNumber()
    {
        return $this->shipmentReferenceNumber;
    }

    /**
     * @param string $shipperNumber
     * @return $this
     */
    public function setShipperNumber($shipperNumber)
    {
        $this->shipperNumber = $shipperNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getShipperNumber()
    {
        return $this->shipperNumber;
    }

    /**
     * @param string $time
     * @return $this
     */
    public function setTime($time)
    {
        $this->time = $time;
        return $this;
    }

    /**
     * @return string
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param string $trackingNumber
     * @return $this
     */
    public function setTrackingNumber($trackingNumber)
    {
        $this->trackingNumber = $trackingNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getTrackingNumber()
    {
        return $this->trackingNumber;
    }

}
