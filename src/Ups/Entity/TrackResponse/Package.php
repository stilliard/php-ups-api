<?php
namespace Ups\Entity\TrackResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  Package implements NodeInterface
{
    /**
     * @var string
     */
    private $trackingNumber;

    /**
     * @var string
     */
    private $rescheduledDeliveryDate;

    /**
     * @var string
     */
    private $rescheduledDeliveryTime;

    /**
     * @var \Ups\Entity\TrackResponse\Redirect
     */
    private $redirect;

    /**
     * @var \Ups\Entity\TrackResponse\Reroute
     */
    private $reroute;

    /**
     * @var \Ups\Entity\TrackResponse\ReturnTo
     */
    private $returnTo;

    /**
     * @var \Ups\Entity\TrackResponse\PackageServiceOptions
     */
    private $packageServiceOptions;

    /**
     * @var array
     */
    private $activity;

    /**
     * @var array
     */
    private $message;

    /**
     * @var \Ups\Entity\TrackResponse\PackageWeight
     */
    private $packageWeight;

    /**
     * @var array
     */
    private $referenceNumber;

    /**
     * @var \Ups\Entity\TrackResponse\Product
     */
    private $product;

    /**
     * @var string
     */
    private $locationAssured;

    /**
     * @var array
     */
    private $alternateTrackingNumber;

    /**
     * @var array
     */
    private $alternateTrackingInfo;

    /**
     * @var array
     */
    private $accessorial;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->TrackingNumber)) {
                $this->setTrackingNumber($attributes->TrackingNumber);
            }
            if (isset($attributes->RescheduledDeliveryDate)) {
                $this->setRescheduledDeliveryDate($attributes->RescheduledDeliveryDate);
            }
            if (isset($attributes->RescheduledDeliveryTime)) {
                $this->setRescheduledDeliveryTime($attributes->RescheduledDeliveryTime);
            }
            if (isset($attributes->Redirect)) {
                $this->setRedirect(new Redirect($attributes->Redirect));
            }
            if (isset($attributes->Reroute)) {
                $this->setReroute(new Reroute($attributes->Reroute));
            }
            if (isset($attributes->ReturnTo)) {
                $this->setReturnTo(new ReturnTo($attributes->ReturnTo));
            }
            if (isset($attributes->PackageServiceOptions)) {
                $this->setPackageServiceOptions(new PackageServiceOptions($attributes->PackageServiceOptions));
            }
            if (isset($attributes->Activity)) {
                $activity = $this->getActivity();
                foreach ($attributes->Activity as $item) {
                    $activity[] = new Activity($item);
                }
                $this->setActivity($activity);
            }
            if (isset($attributes->Message)) {
                $message = $this->getMessage();
                foreach ($attributes->Message as $item) {
                    $message[] = new Message($item);
                }
                $this->setMessage($message);
            }
            if (isset($attributes->PackageWeight)) {
                $this->setPackageWeight(new PackageWeight($attributes->PackageWeight));
            }
            if (isset($attributes->ReferenceNumber)) {
                $referenceNumber = $this->getReferenceNumber();
                foreach ($attributes->ReferenceNumber as $item) {
                    $referenceNumber[] = new ReferenceNumber($item);
                }
                $this->setReferenceNumber($referenceNumber);
            }
            if (isset($attributes->Product)) {
                $this->setProduct(new Product($attributes->Product));
            }
            if (isset($attributes->LocationAssured)) {
                $this->setLocationAssured($attributes->LocationAssured);
            }
            if (isset($attributes->AlternateTrackingNumber)) {
                $alternateTrackingNumber = $this->getAlternateTrackingNumber();
                foreach ($attributes->AlternateTrackingNumber as $item) {
                    $alternateTrackingNumber[] = $item;
                }
                $this->setAlternateTrackingNumber($alternateTrackingNumber);
            }
            if (isset($attributes->AlternateTrackingInfo)) {
                $alternateTrackingInfo = $this->getAlternateTrackingInfo();
                foreach ($attributes->AlternateTrackingInfo as $item) {
                    $alternateTrackingInfo[] = new AlternateTrackingInfo($item);
                }
                $this->setAlternateTrackingInfo($alternateTrackingInfo);
            }
            if (isset($attributes->Accessorial)) {
                $accessorial = $this->getAccessorial();
                foreach ($attributes->Accessorial as $item) {
                    $accessorial[] = new Accessorial($item);
                }
                $this->setAccessorial($accessorial);
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

        $node = $document->createElement('Package');
        if (null !== $this->getTrackingNumber()) {
            $node->appendChild($document->createElement('TrackingNumber', $this->getTrackingNumber()));
        }
        if (null !== $this->getRescheduledDeliveryDate()) {
            $node->appendChild($document->createElement('RescheduledDeliveryDate', $this->getRescheduledDeliveryDate()));
        }
        if (null !== $this->getRescheduledDeliveryTime()) {
            $node->appendChild($document->createElement('RescheduledDeliveryTime', $this->getRescheduledDeliveryTime()));
        }
        if (null !== $this->getRedirect()) {
            $node->appendChild($this->getRedirect()->toNode($document));
        }
        if (null !== $this->getReroute()) {
            $node->appendChild($this->getReroute()->toNode($document));
        }
        if (null !== $this->getReturnTo()) {
            $node->appendChild($this->getReturnTo()->toNode($document));
        }
        if (null !== $this->getPackageServiceOptions()) {
            $node->appendChild($this->getPackageServiceOptions()->toNode($document));
        }
        if (null !== $this->getActivity()) {
            if (count($this->getActivity()) > 0) {
                foreach ($this->getActivity() as $Activity) {
                    $node->appendChild($Activity->toNode($document));
                }
            }
        }
        if (null !== $this->getMessage()) {
            if (count($this->getMessage()) > 0) {
                foreach ($this->getMessage() as $Message) {
                    $node->appendChild($Message->toNode($document));
                }
            }
        }
        if (null !== $this->getPackageWeight()) {
            $node->appendChild($this->getPackageWeight()->toNode($document));
        }
        if (null !== $this->getReferenceNumber()) {
            if (count($this->getReferenceNumber()) > 0) {
                foreach ($this->getReferenceNumber() as $ReferenceNumber) {
                    $node->appendChild($ReferenceNumber->toNode($document));
                }
            }
        }
        if (null !== $this->getProduct()) {
            $node->appendChild($this->getProduct()->toNode($document));
        }
        if (null !== $this->getLocationAssured()) {
            $node->appendChild($document->createElement('LocationAssured', $this->getLocationAssured()));
        }
        if (null !== $this->getAlternateTrackingNumber()) {
            if (count($this->getAlternateTrackingNumber()) > 0) {
                foreach ($this->getAlternateTrackingNumber() as $AlternateTrackingNumber) {
                    $node->appendChild($document->createElement('AlternateTrackingNumber', $AlternateTrackingNumber));
                }
            }
        }
        if (null !== $this->getAlternateTrackingInfo()) {
            if (count($this->getAlternateTrackingInfo()) > 0) {
                foreach ($this->getAlternateTrackingInfo() as $AlternateTrackingInfo) {
                    $node->appendChild($AlternateTrackingInfo->toNode($document));
                }
            }
        }
        if (null !== $this->getAccessorial()) {
            if (count($this->getAccessorial()) > 0) {
                foreach ($this->getAccessorial() as $Accessorial) {
                    $node->appendChild($Accessorial->toNode($document));
                }
            }
        }
        return $node;
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
     * @param \Ups\Entity\TrackResponse\Redirect $redirect
     * @return $this
     */
    public function setRedirect($redirect)
    {
        $this->redirect = $redirect;
        return $this;
    }

    /**
     * @return \Ups\Entity\TrackResponse\Redirect
     */
    public function getRedirect()
    {
        return $this->redirect;
    }

    /**
     * @param \Ups\Entity\TrackResponse\Reroute $reroute
     * @return $this
     */
    public function setReroute($reroute)
    {
        $this->reroute = $reroute;
        return $this;
    }

    /**
     * @return \Ups\Entity\TrackResponse\Reroute
     */
    public function getReroute()
    {
        return $this->reroute;
    }

    /**
     * @param \Ups\Entity\TrackResponse\ReturnTo $returnTo
     * @return $this
     */
    public function setReturnTo($returnTo)
    {
        $this->returnTo = $returnTo;
        return $this;
    }

    /**
     * @return \Ups\Entity\TrackResponse\ReturnTo
     */
    public function getReturnTo()
    {
        return $this->returnTo;
    }

    /**
     * @param \Ups\Entity\TrackResponse\PackageServiceOptions $packageServiceOptions
     * @return $this
     */
    public function setPackageServiceOptions($packageServiceOptions)
    {
        $this->packageServiceOptions = $packageServiceOptions;
        return $this;
    }

    /**
     * @return \Ups\Entity\TrackResponse\PackageServiceOptions
     */
    public function getPackageServiceOptions()
    {
        return $this->packageServiceOptions;
    }

    /**
     * @param array $activity
     * @return $this
     */
    public function setActivity($activity)
    {
        $this->activity = $activity;
        return $this;
    }

    /**
     * @return array
     */
    public function getActivity()
    {
        return $this->activity;
    }

    /**
     * @param array $message
     * @return $this
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return array
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param \Ups\Entity\TrackResponse\PackageWeight $packageWeight
     * @return $this
     */
    public function setPackageWeight($packageWeight)
    {
        $this->packageWeight = $packageWeight;
        return $this;
    }

    /**
     * @return \Ups\Entity\TrackResponse\PackageWeight
     */
    public function getPackageWeight()
    {
        return $this->packageWeight;
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
     * @param \Ups\Entity\TrackResponse\Product $product
     * @return $this
     */
    public function setProduct($product)
    {
        $this->product = $product;
        return $this;
    }

    /**
     * @return \Ups\Entity\TrackResponse\Product
     */
    public function getProduct()
    {
        return $this->product;
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
     * @param array $alternateTrackingNumber
     * @return $this
     */
    public function setAlternateTrackingNumber($alternateTrackingNumber)
    {
        $this->alternateTrackingNumber = $alternateTrackingNumber;
        return $this;
    }

    /**
     * @return array
     */
    public function getAlternateTrackingNumber()
    {
        return $this->alternateTrackingNumber;
    }

    /**
     * @param array $alternateTrackingInfo
     * @return $this
     */
    public function setAlternateTrackingInfo($alternateTrackingInfo)
    {
        $this->alternateTrackingInfo = $alternateTrackingInfo;
        return $this;
    }

    /**
     * @return array
     */
    public function getAlternateTrackingInfo()
    {
        return $this->alternateTrackingInfo;
    }

    /**
     * @param array $accessorial
     * @return $this
     */
    public function setAccessorial($accessorial)
    {
        $this->accessorial = $accessorial;
        return $this;
    }

    /**
     * @return array
     */
    public function getAccessorial()
    {
        return $this->accessorial;
    }

}
