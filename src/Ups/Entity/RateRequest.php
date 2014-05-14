<?php
namespace Ups\Entity;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class RateRequest implements NodeInterface
{
    /**
     * @var \Ups\Entity\PickupType
     */
    private $pickupType;

    /**
     * @var \Ups\Entity\Shipment
     */
    private $shipment;

    function __construct($attributes = null)
    {
        $this->setPickupType(new PickupType());
        $this->setShipment(new Shipment());

        if (null !== $attributes) {
            if (isset($attributes->PickupType)) {
                $this->setPickupType(new PickupType($attributes->PickupType));
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

        $node = $document->createElement('Address');
        $node->appendChild($this->getPickupType()->toNode($document));
        $node->appendChild($this->getShipment()->toNode($document));
        return $node;
    }

    /**
     * @param \Ups\Entity\PickupType $pickupType
     * @return $this
     */
    public function setPickupType($pickupType)
    {
        $this->pickupType = $pickupType;
        return $this;
    }

    /**
     * @return \Ups\Entity\PickupType
     */
    public function getPickupType()
    {
        return $this->pickupType;
    }

    /**
     * @param \Ups\Entity\Shipment $shipment
     * @return $this
     */
    public function setShipment($shipment)
    {
        $this->shipment = $shipment;
        return $this;
    }

    /**
     * @return \Ups\Entity\Shipment
     */
    public function getShipment()
    {
        return $this->shipment;
    }


}
