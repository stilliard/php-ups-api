<?php
namespace Ups\Entity\TrackResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  Shipper implements NodeInterface
{
    /**
     * @var string
     */
    private $shipperNumber;

    /**
     * @var \Ups\Entity\TrackResponse\Address
     */
    private $address;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->ShipperNumber)) {
                $this->setShipperNumber($attributes->ShipperNumber);
            }
            if (isset($attributes->Address)) {
                $this->setAddress(new Address($attributes->Address));
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

        $node = $document->createElement('Shipper');
        if (null !== $this->getShipperNumber()) {
            $node->appendChild($document->createElement('ShipperNumber', $this->getShipperNumber()));
        }
        if (null !== $this->getAddress()) {
            $node->appendChild($this->getAddress()->toNode($document));
        }
        return $node;
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
     * @param \Ups\Entity\TrackResponse\Address $address
     * @return $this
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return \Ups\Entity\TrackResponse\Address
     */
    public function getAddress()
    {
        return $this->address;
    }

}
