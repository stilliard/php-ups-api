<?php
namespace Ups\Entity;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class Shipment implements NodeInterface
{
    /**
     * @var string
     */
    private $description;

    /**
     * @var \Ups\Entity\Shipper
     */
    private $shipper;

    /**
     * @var \Ups\Entity\ShipTo;
     */
    private $shipTo;

    /**
     * @var \Ups\Entity\ShipFrom
     */
    private $shipFrom;

    /**
     * @var \Ups\Entity\Service
     */
    private $service;

    /**
     * @var array
     */
    private $package;

    /**
     * @var \Ups\Entity\ShipmentServiceOptions
     */
    private $shipmentServiceOptions;

    function __construct($attributes = null)
    {
        $this->setPackage(array());

        if (null !== $attributes) {
            if (isset($attributes->Description)) {
                $this->setDescription($attributes->Description);
            }
            if (isset($attributes->Shipper)) {
                $this->setShipper(new Shipper($attributes->Shipper));
            }
            if (isset($attributes->ShipTo)) {
                $this->setShipTo(new ShipTo($attributes->ShipTo));
            }
            if (isset($attributes->ShipFrom)) {
                $this->setShipFrom(new ShipFrom($attributes->ShipFrom));
            }
            if (isset($attributes->Service)) {
                $this->setService(new Service($attributes->Service));
            }
            if (isset($attributes->Package)) {
                $package = $this->getPackage();
                foreach ($attributes->Package as $item) {
                    $package[] = new Package($item);
                }
                $this->setPackage($package);
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

        $node = $document->createElement('Shipment');
        $node->appendChild($document->createElement('Description', $this->getDescription()));
        $node->appendChild($this->getShipper()->toNode($document));
        $node->appendChild($this->getShipTo()->toNode($document));
        $node->appendChild($this->getShipFrom()->toNode($document));
        $node->appendChild($this->getService()->toNode($document));
        if (count($this->getPackage()) > 0) {
            foreach ($this->getPackage() as $item) {
                $node->appendChild($item->toNode($document));
            }
        }
        $node->appendChild($this->getShipmentServiceOptions()->toNode($document));

        return $node;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param array $package
     * @return $this
     */
    public function setPackage($package)
    {
        $this->package = $package;
        return $this;
    }

    /**
     * @return array
     */
    public function getPackage()
    {
        return $this->package;
    }

    /**
     * @param \Ups\Entity\Service $service
     * @return $this
     */
    public function setService($service)
    {
        $this->service = $service;
        return $this;
    }

    /**
     * @return \Ups\Entity\Service
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param \Ups\Entity\ShipFrom $shipFrom
     * @return $this
     */
    public function setShipFrom($shipFrom)
    {
        $this->shipFrom = $shipFrom;
        return $this;
    }

    /**
     * @return \Ups\Entity\ShipFrom
     */
    public function getShipFrom()
    {
        return $this->shipFrom;
    }

    /**
     * @param \Ups\Entity\ShipTo $shipTo
     * @return $this
     */
    public function setShipTo($shipTo)
    {
        $this->shipTo = $shipTo;
        return $this;
    }

    /**
     * @return \Ups\Entity\ShipTo
     */
    public function getShipTo()
    {
        return $this->shipTo;
    }

    /**
     * @param \Ups\Entity\ShipmentServiceOptions $shipmentServiceOptions
     * @return $this
     */
    public function setShipmentServiceOptions($shipmentServiceOptions)
    {
        $this->shipmentServiceOptions = $shipmentServiceOptions;
        return $this;
    }

    /**
     * @return \Ups\Entity\ShipmentServiceOptions
     */
    public function getShipmentServiceOptions()
    {
        return $this->shipmentServiceOptions;
    }

    /**
     * @param \Ups\Entity\Shipper $shipper
     * @return $this
     */
    public function setShipper($shipper)
    {
        $this->shipper = $shipper;
        return $this;
    }

    /**
     * @return \Ups\Entity\Shipper
     */
    public function getShipper()
    {
        return $this->shipper;
    }

}
