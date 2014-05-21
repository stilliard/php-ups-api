<?php
namespace Ups\Entity\TrackRequest;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  TrackRequest implements NodeInterface
{
    /**
     * @var \Ups\Entity\TrackRequest\Request
     */
    private $request;

    /**
     * @var string
     */
    private $trackingNumber;

    /**
     * @var string
     */
    private $shipmentIdentificationNumber;

    /**
     * @var string
     */
    private $candidateBookmark;

    /**
     * @var \Ups\Entity\TrackRequest\ReferenceNumber
     */
    private $referenceNumber;

    /**
     * @var \Ups\Entity\TrackRequest\PickupDateRange
     */
    private $pickupDateRange;

    /**
     * @var string
     */
    private $shipperNumber;

    /**
     * @var string
     */
    private $destinationPostalCode;

    /**
     * @var string
     */
    private $destinationCountryCode;

    /**
     * @var string
     */
    private $originPostalCode;

    /**
     * @var string
     */
    private $originCountryCode;

    /**
     * @var \Ups\Entity\TrackRequest\Shipment
     */
    private $shipment;

    /**
     * @var string
     */
    private $trackingOption;

    /**
     * @var string
     */
    private $uPSWorldWideExpressFreightShipment;

    /**
     * @var string
     */
    private $includeFreight;

    /**
     * @var \Ups\Entity\TrackRequest\ShipperAccountInfo
     */
    private $shipperAccountInfo;

    function __construct($attributes = null)
    {
        $this->setRequest(new Request());
        $this->setReferenceNumber(new ReferenceNumber());

        if (null !== $attributes) {
            if (isset($attributes->Request)) {
                $this->setRequest(new Request($attributes->Request));
            }
            if (isset($attributes->TrackingNumber)) {
                $this->setTrackingNumber($attributes->TrackingNumber);
            }
            if (isset($attributes->ShipmentIdentificationNumber)) {
                $this->setShipmentIdentificationNumber($attributes->ShipmentIdentificationNumber);
            }
            if (isset($attributes->CandidateBookmark)) {
                $this->setCandidateBookmark($attributes->CandidateBookmark);
            }
            if (isset($attributes->ReferenceNumber)) {
                $this->setReferenceNumber(new ReferenceNumber($attributes->ReferenceNumber));
            }
            if (isset($attributes->PickupDateRange)) {
                $this->setPickupDateRange(new PickupDateRange($attributes->PickupDateRange));
            }
            if (isset($attributes->ShipperNumber)) {
                $this->setShipperNumber($attributes->ShipperNumber);
            }
            if (isset($attributes->DestinationPostalCode)) {
                $this->setDestinationPostalCode($attributes->DestinationPostalCode);
            }
            if (isset($attributes->DestinationCountryCode)) {
                $this->setDestinationCountryCode($attributes->DestinationCountryCode);
            }
            if (isset($attributes->OriginPostalCode)) {
                $this->setOriginPostalCode($attributes->OriginPostalCode);
            }
            if (isset($attributes->OriginCountryCode)) {
                $this->setOriginCountryCode($attributes->OriginCountryCode);
            }
            if (isset($attributes->Shipment)) {
                $this->setShipment(new Shipment($attributes->Shipment));
            }
            if (isset($attributes->TrackingOption)) {
                $this->setTrackingOption($attributes->TrackingOption);
            }
            if (isset($attributes->UPSWorldWideExpressFreightShipment)) {
                $this->setUPSWorldWideExpressFreightShipment($attributes->UPSWorldWideExpressFreightShipment);
            }
            if (isset($attributes->IncludeFreight)) {
                $this->setIncludeFreight($attributes->IncludeFreight);
            }
            if (isset($attributes->ShipperAccountInfo)) {
                $this->setShipperAccountInfo(new ShipperAccountInfo($attributes->ShipperAccountInfo));
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

        $node = $document->createElement('TrackRequest');
        $node->appendChild($this->getRequest()->toNode($document));
        if (!empty($this->getTrackingNumber())) {
            $node->appendChild($document->createElement('TrackingNumber', $this->getTrackingNumber()));
        } elseif (!empty($this->getShipmentIdentificationNumber())) {
            $node->appendChild($document->createElement('ShipmentIdentificationNumber', $this->getShipmentIdentificationNumber()));
        } elseif (!empty($this->getCandidateBookmark())) {
            $node->appendChild($document->createElement('CandidateBookmark', $this->getCandidateBookmark()));
        } else {
            $node->appendChild($this->getReferenceNumber()->toNode($document));
            if (null !== $this->getPickupDateRange()) {
                $node->appendChild($this->getPickupDateRange()->toNode($document));
            }
            if (null !== $this->getShipperNumber()) {
                $node->appendChild($document->createElement('ShipperNumber', $this->getShipperNumber()));
            }
            if (null !== $this->getDestinationPostalCode()) {
                $node->appendChild($document->createElement('DestinationPostalCode', $this->getDestinationPostalCode()));
            }
            if (null !== $this->getDestinationCountryCode()) {
                $node->appendChild($document->createElement('DestinationCountryCode', $this->getDestinationCountryCode()));
            }
            if (null !== $this->getOriginPostalCode()) {
                $node->appendChild($document->createElement('OriginPostalCode', $this->getOriginPostalCode()));
            }
            if (null !== $this->getOriginCountryCode()) {
                $node->appendChild($document->createElement('OriginCountryCode', $this->getOriginCountryCode()));
            }
            if (null !== $this->getShipment()) {
                $node->appendChild($this->getShipment()->toNode($document));
            }
        }
        if (null !== $this->getTrackingOption()) {
            $node->appendChild($document->createElement('TrackingOption', $this->getTrackingOption()));
        }
        if (null !== $this->getUPSWorldWideExpressFreightShipment()) {
            $node->appendChild($document->createElement('UPSWorldWideExpressFreightShipment', $this->getUPSWorldWideExpressFreightShipment()));
        }
        if (null !== $this->getIncludeFreight()) {
            $node->appendChild($document->createElement('IncludeFreight', $this->getIncludeFreight()));
        }
        if (null !== $this->getShipperAccountInfo()) {
            $node->appendChild($this->getShipperAccountInfo()->toNode($document));
        }
        return $node;
    }

    /**
     * @param \Ups\Entity\TrackRequest\Request $request
     * @return $this
     */
    public function setRequest($request)
    {
        $this->request = $request;
        return $this;
    }

    /**
     * @return \Ups\Entity\TrackRequest\Request
     */
    public function getRequest()
    {
        return $this->request;
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
     * @param string $shipmentIdentificationNumber
     * @return $this
     */
    public function setShipmentIdentificationNumber($shipmentIdentificationNumber)
    {
        $this->shipmentIdentificationNumber = $shipmentIdentificationNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getShipmentIdentificationNumber()
    {
        return $this->shipmentIdentificationNumber;
    }

    /**
     * @param string $candidateBookmark
     * @return $this
     */
    public function setCandidateBookmark($candidateBookmark)
    {
        $this->candidateBookmark = $candidateBookmark;
        return $this;
    }

    /**
     * @return string
     */
    public function getCandidateBookmark()
    {
        return $this->candidateBookmark;
    }

    /**
     * @param \Ups\Entity\TrackRequest\ReferenceNumber $referenceNumber
     * @return $this
     */
    public function setReferenceNumber($referenceNumber)
    {
        $this->referenceNumber = $referenceNumber;
        return $this;
    }

    /**
     * @return \Ups\Entity\TrackRequest\ReferenceNumber
     */
    public function getReferenceNumber()
    {
        return $this->referenceNumber;
    }

    /**
     * @param \Ups\Entity\TrackRequest\PickupDateRange $pickupDateRange
     * @return $this
     */
    public function setPickupDateRange($pickupDateRange)
    {
        $this->pickupDateRange = $pickupDateRange;
        return $this;
    }

    /**
     * @return \Ups\Entity\TrackRequest\PickupDateRange
     */
    public function getPickupDateRange()
    {
        return $this->pickupDateRange;
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
     * @param string $destinationPostalCode
     * @return $this
     */
    public function setDestinationPostalCode($destinationPostalCode)
    {
        $this->destinationPostalCode = $destinationPostalCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getDestinationPostalCode()
    {
        return $this->destinationPostalCode;
    }

    /**
     * @param string $destinationCountryCode
     * @return $this
     */
    public function setDestinationCountryCode($destinationCountryCode)
    {
        $this->destinationCountryCode = $destinationCountryCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getDestinationCountryCode()
    {
        return $this->destinationCountryCode;
    }

    /**
     * @param string $originPostalCode
     * @return $this
     */
    public function setOriginPostalCode($originPostalCode)
    {
        $this->originPostalCode = $originPostalCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getOriginPostalCode()
    {
        return $this->originPostalCode;
    }

    /**
     * @param string $originCountryCode
     * @return $this
     */
    public function setOriginCountryCode($originCountryCode)
    {
        $this->originCountryCode = $originCountryCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getOriginCountryCode()
    {
        return $this->originCountryCode;
    }

    /**
     * @param \Ups\Entity\TrackRequest\Shipment $shipment
     * @return $this
     */
    public function setShipment($shipment)
    {
        $this->shipment = $shipment;
        return $this;
    }

    /**
     * @return \Ups\Entity\TrackRequest\Shipment
     */
    public function getShipment()
    {
        return $this->shipment;
    }

    /**
     * @param string $trackingOption
     * @return $this
     */
    public function setTrackingOption($trackingOption)
    {
        $this->trackingOption = $trackingOption;
        return $this;
    }

    /**
     * @return string
     */
    public function getTrackingOption()
    {
        return $this->trackingOption;
    }

    /**
     * @param string $uPSWorldWideExpressFreightShipment
     * @return $this
     */
    public function setUPSWorldWideExpressFreightShipment($uPSWorldWideExpressFreightShipment)
    {
        $this->uPSWorldWideExpressFreightShipment = $uPSWorldWideExpressFreightShipment;
        return $this;
    }

    /**
     * @return string
     */
    public function getUPSWorldWideExpressFreightShipment()
    {
        return $this->uPSWorldWideExpressFreightShipment;
    }

    /**
     * @param string $includeFreight
     * @return $this
     */
    public function setIncludeFreight($includeFreight)
    {
        $this->includeFreight = $includeFreight;
        return $this;
    }

    /**
     * @return string
     */
    public function getIncludeFreight()
    {
        return $this->includeFreight;
    }

    /**
     * @param \Ups\Entity\TrackRequest\ShipperAccountInfo $shipperAccountInfo
     * @return $this
     */
    public function setShipperAccountInfo($shipperAccountInfo)
    {
        $this->shipperAccountInfo = $shipperAccountInfo;
        return $this;
    }

    /**
     * @return \Ups\Entity\TrackRequest\ShipperAccountInfo
     */
    public function getShipperAccountInfo()
    {
        return $this->shipperAccountInfo;
    }

}
