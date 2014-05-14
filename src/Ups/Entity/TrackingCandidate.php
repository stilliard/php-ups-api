<?php
namespace Ups\Entity;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class TrackingCandidate implements NodeInterface
{
    /**
     * @var string
     */
    private $trackingNumber;

    /**
     * @var string
     */
    private $destinationPostalCode;

    /**
     * @var string
     */
    private $destinationCountryCode;

    /**
     * @var \Ups\Entity\PickupDateRange
     */
    private $pickupDateRange;

    function __construct($attributes = null)
    {
        $this->setPickupDateRange(new PickupDateRange());

        if (null !== $attributes) {
            if (isset($attributes->TrackingNumber)) {
                $this->setTrackingNumber($attributes->TrackingNumber);
            }
            if (isset($attributes->DestinationPostalCode)) {
                $this->setDestinationPostalCode($attributes->DestinationPostalCode);
            }
            if (isset($attributes->DestinationCountryCode)) {
                $this->setDestinationCountryCode($attributes->DestinationCountryCode);
            }
            if (isset($attributes->PickupDateRange)) {
                $this->setPickupDateRange(new PickupDateRange($attributes->PickupDateRange));
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

        $node = $document->createElement('TrackingCandidate');
        $node->appendChild($document->createElement('TrackingNumber', $this->getTrackingNumber()));
        $node->appendChild($document->createElement('DestinationPostalCode', $this->getDestinationPostalCode()));
        $node->appendChild($document->createElement('DestinationCountryCode', $this->getDestinationCountryCode()));
        $node->appendChild( $this->getPickupDateRange()->toNode($document));
        return $node;
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
     * @param \Ups\Entity\PickupDateRange $pickupDateRange
     * @return $this
     */
    public function setPickupDateRange($pickupDateRange)
    {
        $this->pickupDateRange = $pickupDateRange;
        return $this;
    }

    /**
     * @return \Ups\Entity\PickupDateRange
     */
    public function getPickupDateRange()
    {
        return $this->pickupDateRange;
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
