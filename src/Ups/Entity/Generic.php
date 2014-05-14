<?php
namespace Ups\Entity;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class Generic implements NodeInterface

{
    const AT_VOIDFORMANIFEST = 'VM';
    const AT_UNDELIVERABLERETURNS = 'UR';
    const AT_INVOICEREMOVALSUCCESSFUL = 'IR';
    const AT_TRANSPORTCOMPANYUSPSSCAN = 'TC';
    const AT_POSTALSERVICEPOSSESSIONSCAN = ' PS';
    const AT_UPSEMAILNOTIFICATIONFAILURE = 'FN';
    const AT_DESTINATIONSCAN = 'DS';

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
     * @var \Ups\Entity\Service
     */
    private $service;

    /**
     * @var \Ups\entity\Activity
     */
    private $activity;

    /**
     * @var \Ups\Entity\BillToAccount
     */
    private $billToAccount;

    /**
     * @var \Ups\Entity\ShipTo
     */
    private $shipTo;

    /**
     * @var string
     */
    private $rescheduledDeliveryDate;

    /**
     * @var \Ups\Entity\FailureNotification
     */
    private $failureNotification;

    /**
     * @var string
     */
    private $bookmark;

    function __construct($attributes = null)
    {
        $this->setShipmentReferenceNumber(array());
        $this->setPackageReferenceNumber(array());
        $this->setService(new Service());
        $this->setActivity(new Activity());
        $this->setBillToAccount(new BillToAccount());
        $this->setShipTo(new ShipTo());
        $this->setFailureNotification(new FailureNotification());

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
            if (isset($attributes->Bookmark)) {
                $this->setBookmark($attributes->Bookmark);
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
        $node->appendChild($document->createElement('ActivityType', $this->getActivityType()));
        $node->appendChild($document->createElement('TrackingNumber', $this->getTrackingNumber()));
        $node->appendChild($document->createElement('ShipperNumber', $this->getShipperNumber()));
        $node->appendChild($this->getService()->toNode($document));
        $node->appendChild($this->getActivity()->toNode($document));
        $node->appendChild($this->getBillToAccount()->toNode($document));
        $node->appendChild($this->getShipTo()->toNode($document));
        $node->appendChild($document->createElement('RescheduledDeliveryDate', $this->getRescheduledDeliveryDate()));
        $node->appendChild($this->getFailureNotification()->toNode($document));
        $node->appendChild($document->createElement('Bookmark', $this->getBookmark()));
        return $node;
    }

    /**
     * @param \Ups\entity\Activity $activity
     * @return $this
     */
    public function setActivity($activity)
    {
        $this->activity = $activity;
        return $this;
    }

    /**
     * @return \Ups\entity\Activity
     */
    public function getActivity()
    {
        return $this->activity;
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
     * @param string $bookmark
     * @return $this
     */
    public function setBookmark($bookmark)
    {
        $this->bookmark = $bookmark;
        return $this;
    }

    /**
     * @return string
     */
    public function getBookmark()
    {
        return $this->bookmark;
    }

    /**
     * @param \Ups\Entity\FailureNotification $failureNotification
     * @return $this
     */
    public function setFailureNotification($failureNotification)
    {
        $this->failureNotification = $failureNotification;
        return $this;
    }

    /**
     * @return \Ups\Entity\FailureNotification
     */
    public function getFailureNotification()
    {
        return $this->failureNotification;
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
    public function getshipperNumber()
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

}
