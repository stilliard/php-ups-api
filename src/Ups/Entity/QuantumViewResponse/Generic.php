<?php
namespace Ups\Entity\QuantumViewResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  Generic implements NodeInterface
{
    /**
     * @var string
     */
    private $activityType;

    /**
     * @var string
     */
    private $trackingNumber;

    /**
     * @var string
     */
    private $shipperNumber;

    /**
     * @var array
     */
    private $shipmentReferenceNumber;

    /**
     * @var array
     */
    private $packageReferenceNumber;

    /**
     * @var \Ups\Entity\QuantumViewResponse\Service
     */
    private $service;

    /**
     * @var \Ups\Entity\QuantumViewResponse\Service
     */
    private $activity;

    /**
     * @var \Ups\Entity\QuantumViewResponse\Activity
     */
    private $billToAccount;

    /**
     * @var \Ups\Entity\QuantumViewResponse\ShipTo
     */
    private $shipTo;

    /**
     * @var string
     */
    private $rescheduledDeliveryDate;

    /**
     * @var \Ups\Entity\QuantumViewResponse\FailureNotification
     */
    private $failureNotification;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->ActivityType)) {
                $this->setActivityType($attributes->ActivityType);
            }
            if (isset($attributes->TrackingNumber)) {
                $this->setTrackingNumber($attributes->TrackingNumber);
            }
            if (isset($attributes->ShipperNumber)) {
                $this->setShipperNumber($attributes->ShipperNumber);
            }
            if (isset($attributes->ShipmentReferenceNumber)) {
                $shipmentReferenceNumber = $this->getShipmentReferenceNumber();
                foreach ($attributes->ShipmentReferenceNumber as $item) {
                    $shipmentReferenceNumber[] = new ShipmentReferenceNumber($item);
                }
                $this->setShipmentReferenceNumber($shipmentReferenceNumber);
            }
            if (isset($attributes->PackageReferenceNumber)) {
                $packageReferenceNumber = $this->getPackageReferenceNumber();
                foreach ($attributes->PackageReferenceNumber as $item) {
                    $packageReferenceNumber[] = new PackageReferenceNumber($item);
                }
                $this->setPackageReferenceNumber($packageReferenceNumber);
            }
            if (isset($attributes->Service)) {
                $this->setService(new Service($attributes->Service));
            }
            if (isset($attributes->Activity)) {
                $this->setActivity(new Activity($attributes->Activity));
            }
            if (isset($attributes->BillToAccount)) {
                $this->setBillToAccount(new BillToAccount($attributes->BillToAccount));
            }
            if (isset($attributes->ShipTo)) {
                $this->setShipTo(new ShipTo($attributes->ShipTo));
            }
            if (isset($attributes->RescheduledDeliveryDate)) {
                $this->setRescheduledDeliveryDate($attributes->RescheduledDeliveryDate);
            }
            if (isset($attributes->FailureNotification)) {
                $this->setFailureNotification(new FailureNotification($attributes->FailureNotification));
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

        $node = $document->createElement('Generic');
        $node->appendChild($document->createElement('ActivityType', $this->getActivityType()));
        $node->appendChild($document->createElement('TrackingNumber', $this->getTrackingNumber()));
        if (null !== $this->getShipperNumber()) {
            $node->appendChild($document->createElement('ShipperNumber', $this->getShipperNumber()));
        }
        if (null !== $this->getShipmentReferenceNumber()) {
            if (count($this->getShipmentReferenceNumber()) > 0) {
                foreach ($this->getShipmentReferenceNumber() as $ShipmentReferenceNumber) {
                    $node->appendChild($ShipmentReferenceNumber->toNode($document));
                }
            }
        }
        if (null !== $this->getPackageReferenceNumber()) {
            if (count($this->getPackageReferenceNumber()) > 0) {
                foreach ($this->getPackageReferenceNumber() as $PackageReferenceNumber) {
                    $node->appendChild($PackageReferenceNumber->toNode($document));
                }
            }
        }
        if (null !== $this->getService()) {
            $node->appendChild($this->getService()->toNode($document));
        }
        if (null !== $this->getActivity()) {
            $node->appendChild($this->getActivity()->toNode($document));
        }
        if (null !== $this->getBillToAccount()) {
            $node->appendChild($this->getBillToAccount()->toNode($document));
        }
        if (null !== $this->getShipTo()) {
            $node->appendChild($this->getShipTo()->toNode($document));
        }
        if (null !== $this->getRescheduledDeliveryDate()) {
            $node->appendChild($document->createElement('RescheduledDeliveryDate', $this->getRescheduledDeliveryDate()));
        }
        if (null !== $this->getFailureNotification()) {
            $node->appendChild($this->getFailureNotification()->toNode($document));
        }
        return $node;
    }

    /**
     * @param string $activityType
     * @return $this
     */
    public function setActivityType($activityType)
    {
        $this->activityType = $activityType;
        return $this;
    }

    /**
     * @return string
     */
    public function getActivityType()
    {
        return $this->activityType;
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
     * @param \Ups\Entity\QuantumViewResponse\Activity $activity
     * @return $this
     */
    public function setActivity($activity)
    {
        $this->activity = $activity;
        return $this;
    }

    /**
     * @return \Ups\Entity\QuantumViewResponse\Activity
     */
    public function getActivity()
    {
        return $this->activity;
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
     * @param \Ups\Entity\QuantumViewResponse\FailureNotification $failureNotification
     * @return $this
     */
    public function setFailureNotification($failureNotification)
    {
        $this->failureNotification = $failureNotification;
        return $this;
    }

    /**
     * @return \Ups\Entity\QuantumViewResponse\FailureNotification
     */
    public function getFailureNotification()
    {
        return $this->failureNotification;
    }

}
