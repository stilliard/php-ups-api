<?php
namespace Ups\Entity\RateRequest;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  Shipper implements NodeInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $shipperNumber;

    /**
     * @var \Ups\Entity\RateRequest\Address
     */
    private $address;

    function __construct($attributes = null)
    {
        $this->setAddress(new Address());

        if (null !== $attributes) {
            if (isset($attributes->Name)) {
                $this->setName($attributes->Name);
            }
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
        if (null !== $this->getName()) {
            $node->appendChild($document->createElement('Name', $this->getName()));
        }
        if (null !== $this->getShipperNumber()) {
            $node->appendChild($document->createElement('ShipperNumber', $this->getShipperNumber()));
        }
        $node->appendChild($this->getAddress()->toNode($document));
        return $node;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
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
     * @param \Ups\Entity\RateRequest\Address $address
     * @return $this
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateRequest\Address
     */
    public function getAddress()
    {
        return $this->address;
    }

}
