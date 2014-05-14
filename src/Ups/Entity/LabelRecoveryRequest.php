<?php
namespace Ups\Entity;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class LabelRecoveryRequest implements NodeInterface
{
    /**
     * @var \Ups\Entity\LabelSpecification
     */
    private $labelSpecification;

    /**
     * @var \Ups\Entity\Translate
     */
    private $translate;

    /**
     * @var \Ups\Entity\LabelDelivery
     */
    private $labelDelivery;

    /**
     * @var \Ups\Entity\ReferenceNumber
     */
    private $referenceNumber;

    /**
     * @var string
     */
    private $trackingNumber;

    /**
     * @var string
     */
    private $shipperNumber;

    function __construct($attributes = null)
    {
        $this->setLabelSpecification(new LabelSpecification());
        $this->setTranslate(new Translate());
        $this->setLabelDelivery(new LabelDelivery());
        $this->setReferenceNumber(new ReferenceNumber());

        if (null !== $attributes) {
            if (isset($attributes->LabelSpecification)) {
                $this->setLabelSpecification(new LabelSpecification($attributes->LabelSpecification));
            }
            if (isset($attributes->Translate)) {
                $this->setTranslate(new Translate($attributes->Translate));
            }
            if (isset($attributes->LabelDelivery)) {
                $this->setLabelDelivery(new LabelDelivery($attributes->LabelDelivery));
            }
            if (isset($attributes->ReferenceNumber)) {
                $this->setReferenceNumber(new ReferenceNumber($attributes->ReferenceNumber));
            }
            if (isset($attributes->TrackingNumber)) {
                $this->setTrackingNumber($attributes->TrackingNumber);
            }
            if (isset($attributes->ShipperNumber)) {
                $this->setShipperNumber($attributes->ShipperNumber);
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

        $node = $document->createElement('LabelRecoveryRequest');
        $node->appendChild($this->getLabelSpecification()->toNode($document));
        $node->appendChild($this->getTranslate()->toNode($document));
        $node->appendChild($this->getLabelDelivery()->toNode($document));
        $node->appendChild( $this->getReferenceNumber()->toNode($document));
        $node->appendChild($document->createElement('TrackingNumber', $this->getTrackingNumber()));
        $node->appendChild($document->createElement('ShipperNumber', $this->getShipperNumber()));
        return $node;
    }

    /**
     * @param \Ups\Entity\LabelDelivery $labelDelivery
     * @return $this
     */
    public function setLabelDelivery($labelDelivery)
    {
        $this->labelDelivery = $labelDelivery;
        return $this;
    }

    /**
     * @return \Ups\Entity\LabelDelivery
     */
    public function getLabelDelivery()
    {
        return $this->labelDelivery;
    }

    /**
     * @param \Ups\Entity\LabelSpecification $labelSpecification
     * @return $this
     */
    public function setLabelSpecification($labelSpecification)
    {
        $this->labelSpecification = $labelSpecification;
        return $this;
    }

    /**
     * @return \Ups\Entity\LabelSpecification
     */
    public function getLabelSpecification()
    {
        return $this->labelSpecification;
    }

    /**
     * @param \Ups\Entity\ReferenceNumber $referenceNumber
     * @return $this
     */
    public function setReferenceNumber($referenceNumber)
    {
        $this->referenceNumber = $referenceNumber;
        return $this;
    }

    /**
     * @return \Ups\Entity\ReferenceNumber
     */
    public function getReferenceNumber()
    {
        return $this->referenceNumber;
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
     * @param \Ups\Entity\Translate $translate
     * @return $this
     */
    public function setTranslate($translate)
    {
        $this->translate = $translate;
        return $this;
    }

    /**
     * @return \Ups\Entity\Translate
     */
    public function getTranslate()
    {
        return $this->translate;
    }

}
