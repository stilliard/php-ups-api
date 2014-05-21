<?php
namespace Ups\Entity\QuantumViewResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  ShipmentServiceOptions implements NodeInterface
{
    /**
     * @var \Ups\Entity\QuantumViewResponse\SaturdayPickup
     */
    private $saturdayPickup;

    /**
     * @var \Ups\Entity\QuantumViewResponse\SaturdayDelivery
     */
    private $saturdayDelivery;

    /**
     * @var \Ups\Entity\QuantumViewResponse\CallTagARS
     */
    private $callTagARS;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->SaturdayPickup)) {
                $this->setSaturdayPickup(new SaturdayPickup($attributes->SaturdayPickup));
            }
            if (isset($attributes->SaturdayDelivery)) {
                $this->setSaturdayDelivery(new SaturdayDelivery($attributes->SaturdayDelivery));
            }
            if (isset($attributes->CallTagARS)) {
                $this->setCallTagARS(new CallTagARS($attributes->CallTagARS));
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

        $node = $document->createElement('ShipmentServiceOptions');
        if (null !== $this->getSaturdayPickup()) {
            $node->appendChild($this->getSaturdayPickup()->toNode($document));
        }
        if (null !== $this->getSaturdayDelivery()) {
            $node->appendChild($this->getSaturdayDelivery()->toNode($document));
        }
        if (null !== $this->getCallTagARS()) {
            $node->appendChild($this->getCallTagARS()->toNode($document));
        }
        return $node;
    }

    /**
     * @param \Ups\Entity\QuantumViewResponse\SaturdayPickup $saturdayPickup
     * @return $this
     */
    public function setSaturdayPickup($saturdayPickup)
    {
        $this->saturdayPickup = $saturdayPickup;
        return $this;
    }

    /**
     * @return \Ups\Entity\QuantumViewResponse\SaturdayPickup
     */
    public function getSaturdayPickup()
    {
        return $this->saturdayPickup;
    }

    /**
     * @param \Ups\Entity\QuantumViewResponse\SaturdayDelivery $saturdayDelivery
     * @return $this
     */
    public function setSaturdayDelivery($saturdayDelivery)
    {
        $this->saturdayDelivery = $saturdayDelivery;
        return $this;
    }

    /**
     * @return \Ups\Entity\QuantumViewResponse\SaturdayDelivery
     */
    public function getSaturdayDelivery()
    {
        return $this->saturdayDelivery;
    }

    /**
     * @param \Ups\Entity\QuantumViewResponse\CallTagARS $callTagARS
     * @return $this
     */
    public function setCallTagARS($callTagARS)
    {
        $this->callTagARS = $callTagARS;
        return $this;
    }

    /**
     * @return \Ups\Entity\QuantumViewResponse\CallTagARS
     */
    public function getCallTagARS()
    {
        return $this->callTagARS;
    }

}
