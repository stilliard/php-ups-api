<?php
namespace Ups\Entity\QuantumViewResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  Origin implements NodeInterface
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
    private $shipperNumber;

    /**
     * @var string
     */
    private $trackingNumber;

    /**
     * @var string
     */
    private $date;

    /**
     * @var string
     */
    private $time;

    /**
     * @var \Ups\Entity\QuantumViewResponse\ActivityLocation
     */
    private $activityLocation;

    /**
     * @var \Ups\Entity\QuantumViewResponse\BillToAccount
     */
    private $billToAccount;

    /**
     * @var string
     */
    private $scheduledDeliveryDate;

    /**
     * @var string
     */
    private $scheduledDeliveryTime;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->PackageReferenceNumber)) {
                $packageReferenceNumber = $this->getPackageReferenceNumber();
                foreach ($attributes->PackageReferenceNumber as $item) {
                    $packageReferenceNumber[] = new PackageReferenceNumber($item);
                }
                $this->setPackageReferenceNumber($packageReferenceNumber);
            }
            if (isset($attributes->ShipmentReferenceNumber)) {
                $shipmentReferenceNumber = $this->getShipmentReferenceNumber();
                foreach ($attributes->ShipmentReferenceNumber as $item) {
                    $shipmentReferenceNumber[] = new ShipmentReferenceNumber($item);
                }
                $this->setShipmentReferenceNumber($shipmentReferenceNumber);
            }
            if (isset($attributes->ShipperNumber)) {
                $this->setShipperNumber($attributes->ShipperNumber);
            }
            if (isset($attributes->TrackingNumber)) {
                $this->setTrackingNumber($attributes->TrackingNumber);
            }
            if (isset($attributes->Date)) {
                $this->setDate($attributes->Date);
            }
            if (isset($attributes->Time)) {
                $this->setTime($attributes->Time);
            }
            if (isset($attributes->ActivityLocation)) {
                $this->setActivityLocation(new ActivityLocation($attributes->ActivityLocation));
            }
            if (isset($attributes->BillToAccount)) {
                $this->setBillToAccount(new BillToAccount($attributes->BillToAccount));
            }
            if (isset($attributes->ScheduledDeliveryDate)) {
                $this->setScheduledDeliveryDate($attributes->ScheduledDeliveryDate);
            }
            if (isset($attributes->ScheduledDeliveryTime)) {
                $this->setScheduledDeliveryTime($attributes->ScheduledDeliveryTime);
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

        $node = $document->createElement('Origin');
        if (null !== $this->getPackageReferenceNumber()) {
            if (count($this->getPackageReferenceNumber()) > 0) {
                foreach ($this->getPackageReferenceNumber() as $PackageReferenceNumber) {
                    $node->appendChild($PackageReferenceNumber->toNode($document));
                }
            }
        }
        if (null !== $this->getShipmentReferenceNumber()) {
            if (count($this->getShipmentReferenceNumber()) > 0) {
                foreach ($this->getShipmentReferenceNumber() as $ShipmentReferenceNumber) {
                    $node->appendChild($ShipmentReferenceNumber->toNode($document));
                }
            }
        }
        $node->appendChild($document->createElement('ShipperNumber', $this->getShipperNumber()));
        $node->appendChild($document->createElement('TrackingNumber', $this->getTrackingNumber()));
        $node->appendChild($document->createElement('Date', $this->getDate()));
        $node->appendChild($document->createElement('Time', $this->getTime()));
        if (null !== $this->getActivityLocation()) {
            $node->appendChild($this->getActivityLocation()->toNode($document));
        }
        if (null !== $this->getBillToAccount()) {
            $node->appendChild($this->getBillToAccount()->toNode($document));
        }
        if (null !== $this->getScheduledDeliveryDate()) {
            $node->appendChild($document->createElement('ScheduledDeliveryDate', $this->getScheduledDeliveryDate()));
        }
        if (null !== $this->getScheduledDeliveryTime()) {
            $node->appendChild($document->createElement('ScheduledDeliveryTime', $this->getScheduledDeliveryTime()));
        }
        return $node;
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
     * @param \Ups\Entity\QuantumViewResponse\ActivityLocation $activityLocation
     * @return $this
     */
    public function setActivityLocation($activityLocation)
    {
        $this->activityLocation = $activityLocation;
        return $this;
    }

    /**
     * @return \Ups\Entity\QuantumViewResponse\ActivityLocation
     */
    public function getActivityLocation()
    {
        return $this->activityLocation;
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

}
