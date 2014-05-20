<?php
namespace Ups\Entity\RateRequest;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  RatingServiceSelectionRequest implements NodeInterface
{
    /**
     * @var \Ups\Entity\RateRequest\Request
     */
    private $request;

    /**
     * @var \Ups\Entity\RateRequest\Pickup
     */
    private $pickup;

    /**
     * @var \Ups\Entity\RateRequest\CustomerClassification
     */
    private $customerClassification;

    /**
     * @var \Ups\Entity\RateRequest\Shipment
     */
    private $shipment;

    function __construct($attributes = null)
    {
        $this->setRequest(new Request());
        $this->setShipment(new Shipment());

        if (null !== $attributes) {
            if (isset($attributes->Request)) {
                $this->setRequest(new Request($attributes->Request));
            }
            if (isset($attributes->Pickup)) {
                $this->setPickup(new Pickup($attributes->Pickup));
            }
            if (isset($attributes->CustomerClassification)) {
                $this->setCustomerClassification(new CustomerClassification($attributes->CustomerClassification));
            }
            if (isset($attributes->Shipment)) {
                $this->setShipment(new Shipment($attributes->Shipment));
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

        $node = $document->createElement('RatingServiceSelectionRequest');
        $node->appendChild($this->getRequest()->toNode($document));
        if (null !== $this->getPickup()) {
            $node->appendChild($this->getPickup()->toNode($document));
        }
        if (null !== $this->getCustomerClassification()) {
            $node->appendChild($this->getCustomerClassification()->toNode($document));
        }
        $node->appendChild($this->getShipment()->toNode($document));
        return $node;
    }

    /**
     * @param \Ups\Entity\RateRequest\Request $request
     * @return $this
     */
    public function setRequest($request)
    {
        $this->request = $request;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateRequest\Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param \Ups\Entity\RateRequest\Pickup $pickup
     * @return $this
     */
    public function setPickup($pickup)
    {
        $this->pickup = $pickup;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateRequest\Pickup
     */
    public function getPickup()
    {
        return $this->pickup;
    }

    /**
     * @param \Ups\Entity\RateRequest\CustomerClassification $customerClassification
     * @return $this
     */
    public function setCustomerClassification($customerClassification)
    {
        $this->customerClassification = $customerClassification;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateRequest\CustomerClassification
     */
    public function getCustomerClassification()
    {
        return $this->customerClassification;
    }

    /**
     * @param \Ups\Entity\RateRequest\Shipment $shipment
     * @return $this
     */
    public function setShipment($shipment)
    {
        $this->shipment = $shipment;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateRequest\Shipment
     */
    public function getShipment()
    {
        return $this->shipment;
    }

}
