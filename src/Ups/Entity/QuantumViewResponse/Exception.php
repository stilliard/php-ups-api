<?php
namespace Ups\Entity\QuantumViewResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  Exception implements NodeInterface
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
     * @var \Ups\Entity\QuantumViewResponse\UpdatedAddress
     */
    private $updatedAddress;

    /**
     * @var string
     */
    private $statusCode;

    /**
     * @var string
     */
    private $statusDescription;

    /**
     * @var string
     */
    private $reasonCode;

    /**
     * @var string
     */
    private $reasonDescription;

    /**
     * @var \Ups\Entity\QuantumViewResponse\Resolution
     */
    private $resolution;

    /**
     * @var string
     */
    private $rescheduledDeliveryDate;

    /**
     * @var string
     */
    private $rescheduledDeliveryTime;

    /**
     * @var \Ups\Entity\QuantumViewResponse\ActivityLocation
     */
    private $activityLocation;

    /**
     * @var \Ups\Entity\QuantumViewResponse\BillToAccount
     */
    private $billToAccount;

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
            if (isset($attributes->UpdatedAddress)) {
                $this->setUpdatedAddress(new UpdatedAddress($attributes->UpdatedAddress));
            }
            if (isset($attributes->StatusCode)) {
                $this->setStatusCode($attributes->StatusCode);
            }
            if (isset($attributes->StatusDescription)) {
                $this->setStatusDescription($attributes->StatusDescription);
            }
            if (isset($attributes->ReasonCode)) {
                $this->setReasonCode($attributes->ReasonCode);
            }
            if (isset($attributes->ReasonDescription)) {
                $this->setReasonDescription($attributes->ReasonDescription);
            }
            if (isset($attributes->Resolution)) {
                $this->setResolution(new Resolution($attributes->Resolution));
            }
            if (isset($attributes->RescheduledDeliveryDate)) {
                $this->setRescheduledDeliveryDate($attributes->RescheduledDeliveryDate);
            }
            if (isset($attributes->RescheduledDeliveryTime)) {
                $this->setRescheduledDeliveryTime($attributes->RescheduledDeliveryTime);
            }
            if (isset($attributes->ActivityLocation)) {
                $this->setActivityLocation(new ActivityLocation($attributes->ActivityLocation));
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

        $node = $document->createElement('Exception');
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
        if (null !== $this->getUpdatedAddress()) {
            $node->appendChild($this->getUpdatedAddress()->toNode($document));
        }
        if (null !== $this->getStatusCode()) {
            $node->appendChild($document->createElement('StatusCode', $this->getStatusCode()));
        }
        if (null !== $this->getStatusDescription()) {
            $node->appendChild($document->createElement('StatusDescription', $this->getStatusDescription()));
        }
        if (null !== $this->getReasonCode()) {
            $node->appendChild($document->createElement('ReasonCode', $this->getReasonCode()));
        }
        if (null !== $this->getReasonDescription()) {
            $node->appendChild($document->createElement('ReasonDescription', $this->getReasonDescription()));
        }
        if (null !== $this->getResolution()) {
            $node->appendChild($this->getResolution()->toNode($document));
        }
        if (null !== $this->getRescheduledDeliveryDate()) {
            $node->appendChild($document->createElement('RescheduledDeliveryDate', $this->getRescheduledDeliveryDate()));
        }
        if (null !== $this->getRescheduledDeliveryTime()) {
            $node->appendChild($document->createElement('RescheduledDeliveryTime', $this->getRescheduledDeliveryTime()));
        }
        if (null !== $this->getActivityLocation()) {
            $node->appendChild($this->getActivityLocation()->toNode($document));
        }
        if (null !== $this->getBillToAccount()) {
            $node->appendChild($this->getBillToAccount()->toNode($document));
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
     * @param \Ups\Entity\QuantumViewResponse\UpdatedAddress $updatedAddress
     * @return $this
     */
    public function setUpdatedAddress($updatedAddress)
    {
        $this->updatedAddress = $updatedAddress;
        return $this;
    }

    /**
     * @return \Ups\Entity\QuantumViewResponse\UpdatedAddress
     */
    public function getUpdatedAddress()
    {
        return $this->updatedAddress;
    }

    /**
     * @param string $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param string $statusDescription
     * @return $this
     */
    public function setStatusDescription($statusDescription)
    {
        $this->statusDescription = $statusDescription;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatusDescription()
    {
        return $this->statusDescription;
    }

    /**
     * @param string $reasonCode
     * @return $this
     */
    public function setReasonCode($reasonCode)
    {
        $this->reasonCode = $reasonCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getReasonCode()
    {
        return $this->reasonCode;
    }

    /**
     * @param string $reasonDescription
     * @return $this
     */
    public function setReasonDescription($reasonDescription)
    {
        $this->reasonDescription = $reasonDescription;
        return $this;
    }

    /**
     * @return string
     */
    public function getReasonDescription()
    {
        return $this->reasonDescription;
    }

    /**
     * @param \Ups\Entity\QuantumViewResponse\Resolution $resolution
     * @return $this
     */
    public function setResolution($resolution)
    {
        $this->resolution = $resolution;
        return $this;
    }

    /**
     * @return \Ups\Entity\QuantumViewResponse\Resolution
     */
    public function getResolution()
    {
        return $this->resolution;
    }

    /**
     * @param string $rescheduledDeliveryDate
     * @return $this
     */
    public function setRescheduledDeliveryDate($rescheduledDeliveryDate)
    {
        $this->rescheduledDeliveryDate = $rescheduledDeliveryDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getRescheduledDeliveryDate()
    {
        return $this->rescheduledDeliveryDate;
    }

    /**
     * @param string $rescheduledDeliveryTime
     * @return $this
     */
    public function setRescheduledDeliveryTime($rescheduledDeliveryTime)
    {
        $this->rescheduledDeliveryTime = $rescheduledDeliveryTime;
        return $this;
    }

    /**
     * @return string
     */
    public function getRescheduledDeliveryTime()
    {
        return $this->rescheduledDeliveryTime;
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

}
