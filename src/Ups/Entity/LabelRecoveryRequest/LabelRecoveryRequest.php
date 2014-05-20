<?php
namespace Ups\Entity\LabelRecoveryRequest;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  LabelRecoveryRequest implements NodeInterface
{
    /**
     * @var \Ups\Entity\LabelRecoveryRequest\Request
     */
    private $request;

    /**
     * @var \Ups\Entity\LabelRecoveryRequest\LabelSpecification
     */
    private $labelSpecification;

    /**
     * @var array
     */
    private $translate;

    /**
     * @var \Ups\Entity\LabelRecoveryRequest\LabelDelivery
     */
    private $labelDelivery;

    /**
     * @var string
     */
    private $trackingNumber;

    /**
     * @var \Ups\Entity\LabelRecoveryRequest\ReferenceNumber
     */
    private $referenceNumber;

    /**
     * @var string
     */
    private $shipperNumber;

    function __construct($attributes = null)
    {
        $this->setRequest(new Request());
        //$this->setReferenceNumber(new ReferenceNumber());

        if (null !== $attributes) {
            if (isset($attributes->Request)) {
                $this->setRequest(new Request($attributes->Request));
            }
            if (isset($attributes->LabelSpecification)) {
                $this->setLabelSpecification(new LabelSpecification($attributes->LabelSpecification));
            }
            if (isset($attributes->Translate)) {
                $translate = $this->getTranslate();
                foreach ($attributes->Translate as $item) {
                    $translate[] = new Translate($item);
                }
                $this->setTranslate($translate);
            }
            if (isset($attributes->LabelDelivery)) {
                $this->setLabelDelivery(new LabelDelivery($attributes->LabelDelivery));
            }
            if (isset($attributes->TrackingNumber)) {
                $this->setTrackingNumber($attributes->TrackingNumber);
            }
            if (isset($attributes->ReferenceNumber)) {
                $this->setReferenceNumber(new ReferenceNumber($attributes->ReferenceNumber));
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
        $node->appendChild($this->getRequest()->toNode($document));
        if (null !== $this->getLabelSpecification()) {
            $node->appendChild($this->getLabelSpecification()->toNode($document));
        }
        if (null !== $this->getTranslate()) {
            if (count($this->getTranslate()) > 0) {
                foreach ($this->getTranslate() as $Translate) {
                    $node->appendChild($Translate->toNode($document));
                }
            }
        }
        if (null !== $this->getLabelDelivery()) {
            $node->appendChild($this->getLabelDelivery()->toNode($document));
        }
        $node->appendChild($document->createElement('TrackingNumber', $this->getTrackingNumber()));
        if (null !== $this->getReferenceNumber()) {
            $node->appendChild($this->getReferenceNumber()->toNode($document));
        }
        if (null !== $this->getShipperNumber()) {
            $node->appendChild($document->createElement('ShipperNumber', $this->getShipperNumber()));
        }
        return $node;
    }

    /**
     * @param \Ups\Entity\LabelRecoveryRequest\Request $request
     * @return $this
     */
    public function setRequest($request)
    {
        $this->request = $request;
        return $this;
    }

    /**
     * @return \Ups\Entity\LabelRecoveryRequest\Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param \Ups\Entity\LabelRecoveryRequest\LabelSpecification $labelSpecification
     * @return $this
     */
    public function setLabelSpecification($labelSpecification)
    {
        $this->labelSpecification = $labelSpecification;
        return $this;
    }

    /**
     * @return \Ups\Entity\LabelRecoveryRequest\LabelSpecification
     */
    public function getLabelSpecification()
    {
        return $this->labelSpecification;
    }

    /**
     * @param array $translate
     * @return $this
     */
    public function setTranslate($translate)
    {
        $this->translate = $translate;
        return $this;
    }

    /**
     * @return array
     */
    public function getTranslate()
    {
        return $this->translate;
    }

    /**
     * @param \Ups\Entity\LabelRecoveryRequest\LabelDelivery $labelDelivery
     * @return $this
     */
    public function setLabelDelivery($labelDelivery)
    {
        $this->labelDelivery = $labelDelivery;
        return $this;
    }

    /**
     * @return \Ups\Entity\LabelRecoveryRequest\LabelDelivery
     */
    public function getLabelDelivery()
    {
        return $this->labelDelivery;
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
     * @param \Ups\Entity\LabelRecoveryRequest\ReferenceNumber $referenceNumber
     * @return $this
     */
    public function setReferenceNumber($referenceNumber)
    {
        $this->referenceNumber = $referenceNumber;
        return $this;
    }

    /**
     * @return \Ups\Entity\LabelRecoveryRequest\ReferenceNumber
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

}
