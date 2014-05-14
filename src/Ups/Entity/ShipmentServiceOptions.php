<?php
namespace Ups\Entity;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class ShipmentServiceOptions implements NodeInterface
{
    /**
     * @var string
     */
    private $saturdayPickup;

    /**
     * @var string
     */
    private $saturdayDelivery;

    /**
     * @var \Ups\Entity\CallTagARS
     */
    private $callTagARS;

    function __construct($response = null)
    {
        $this->setCallTagARS(new CallTagARS());

        if (null !== $response) {
            if (isset($response->SaturdayPickup)) {
                $this->setSaturdayPickup($response->SaturdayPickup);
            }
            if (isset($response->SaturdayDelivery)) {
                $this->setSaturdayDelivery($response->SaturdayDelivery);
            }
            if (isset($response->CallTagARS)) {
                $this->setCallTagARS(new CallTagARS($response->CallTagARS));
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
        $node->appendChild($document->createElement('SaturdayPickup', $this->getSaturdayPickup()));
        $node->appendChild($document->createElement('SaturdayDelivery', $this->getSaturdayDelivery()));
        $node->appendChild($this->getCallTagARS()->toNode($document));
        return $node;
    }

    /**
     * @param \Ups\Entity\CallTagARS $callTagARS
     * @return $this
     */
    public function setCallTagARS($callTagARS)
    {
        $this->callTagARS = $callTagARS;
        return $this;
    }

    /**
     * @return \Ups\Entity\CallTagARS
     */
    public function getCallTagARS()
    {
        return $this->callTagARS;
    }

    /**
     * @param string $saturdayDelivery
     * @return $this
     */
    public function setSaturdayDelivery($saturdayDelivery)
    {
        $this->saturdayDelivery = $saturdayDelivery;
        return $this;
    }

    /**
     * @return string
     */
    public function getSaturdayDelivery()
    {
        return $this->saturdayDelivery;
    }

    /**
     * @param string $saturdayPickup
     * @return $this
     */
    public function setSaturdayPickup($saturdayPickup)
    {
        $this->saturdayPickup = $saturdayPickup;
        return $this;
    }

    /**
     * @return string
     */
    public function getSaturdayPickup()
    {
        return $this->saturdayPickup;
    }

}
