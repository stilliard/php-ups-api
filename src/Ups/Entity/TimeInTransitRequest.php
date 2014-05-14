<?php
namespace Ups\Entity;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class TimeInTransitRequest implements NodeInterface
{
    /**
     * @var \Ups\Entity\TransitFrom
     */
    private $transitFrom;

    /**
     * @var \Ups\Entity\TransitTo
     */
    private $transitTo;

    /**
     * @var \Ups\Entity\ShipmentWeight
     */
    private $shipmentWeight;

    /**
     * @var string
     */
    private $totalPackagesInShipment;

    /**
     * @var \Ups\Entity\InvoiceLineTotal
     */
    private $invoiceLineTotal;

    /**
     * @var string
     */
    private $pickupDate;

    /**
     * @var string
     */
    private $documentsOnlyIndicator;

    function __construct($attributes = null)
    {
        $this->setTransitFrom(new Address());
        $this->setTransitTo(new Address());
        $this->setShipmentWeight(new ShipmentWeight());
        $this->setInvoiceLineTotal(new Charges());

        if (null !== $attributes) {
            if (isset($attributes->TransitFrom)) {
                $this->setTransitFrom(new TransitFrom($attributes->TransitFrom));
            }
            if (isset($attributes->TransitTo)) {
                $this->setTransitTo(new TransitTo($attributes->TransitTo));
            }
            if (isset($attributes->ShipmentWeight)) {
                $this->setShipmentWeight(new ShipmentWeight($attributes->ShipmentWeight));
            }
            if (isset($attributes->InvoiceLineTotal)) {
                $this->setInvoiceLineTotal(new InvoiceLineTotal($attributes->InvoiceLineTotal));
            }
            if (isset($attributes->TotalPackagesInShipment)) {
                $this->setTotalPackagesInShipment($attributes->TotalPackagesInShipment);
            }
            if (isset($attributes->PickupDate)) {
                $this->setPickupDate($attributes->PickupDate);
            }
            if (isset($attributes->DocumentsOnlyIndicator)) {
                $this->setDocumentsOnlyIndicator($attributes->DocumentsOnlyIndicator);
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

        $node = $document->createElement('TimeInTransitRequest');
        $node->appendChild($this->getTransitFrom()->toNode($document));
        $node->appendChild($this->getTransitTo()->toNode($document));
        $node->appendChild($this->getShipmentWeight()->toNode($document));
        $node->appendChild($this->getInvoiceLineTotal()->toNode($document));
        $node->appendChild($document->createElement('TotalPackagesInShipment', $this->getTotalPackagesInShipment()));
        $node->appendChild($document->createElement('PickupDate', $this->getPickupDate()));
        $node->appendChild($document->createElement('DocumentsOnlyIndicator', $this->getDocumentsOnlyIndicator()));
        return $node;
    }

    /**
     * @param string $documentsOnlyIndicator
     * @return $this
     */
    public function setDocumentsOnlyIndicator($documentsOnlyIndicator)
    {
        $this->documentsOnlyIndicator = $documentsOnlyIndicator;
        return $this;
    }

    /**
     * @return string
     */
    public function getDocumentsOnlyIndicator()
    {
        return $this->documentsOnlyIndicator;
    }

    /**
     * @param \Ups\Entity\InvoiceLineTotal $invoiceLineTotal
     * @return $this
     */
    public function setInvoiceLineTotal($invoiceLineTotal)
    {
        $this->invoiceLineTotal = $invoiceLineTotal;
        return $this;
    }

    /**
     * @return \Ups\Entity\InvoiceLineTotal
     */
    public function getInvoiceLineTotal()
    {
        return $this->invoiceLineTotal;
    }

    /**
     * @param string $pickupDate
     * @return $this
     */
    public function setPickupDate($pickupDate)
    {
        $this->pickupDate = $pickupDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getPickupDate()
    {
        return $this->pickupDate;
    }

    /**
     * @param \Ups\Entity\ShipmentWeight $shipmentWeight
     * @return $this
     */
    public function setShipmentWeight($shipmentWeight)
    {
        $this->shipmentWeight = $shipmentWeight;
        return $this;
    }

    /**
     * @return \Ups\Entity\ShipmentWeight
     */
    public function getShipmentWeight()
    {
        return $this->shipmentWeight;
    }

    /**
     * @param string $totalPackagesInShipment
     * @return $this
     */
    public function setTotalPackagesInShipment($totalPackagesInShipment)
    {
        $this->totalPackagesInShipment = $totalPackagesInShipment;
        return $this;
    }

    /**
     * @return string
     */
    public function getTotalPackagesInShipment()
    {
        return $this->totalPackagesInShipment;
    }

    /**
     * @param \Ups\Entity\TransitFrom $transitFrom
     * @return $this
     */
    public function setTransitFrom($transitFrom)
    {
        $this->transitFrom = $transitFrom;
        return $this;
    }

    /**
     * @return \Ups\Entity\TransitFrom
     */
    public function getTransitFrom()
    {
        return $this->transitFrom;
    }

    /**
     * @param \Ups\Entity\TransitTo $transitTo
     * @return $this
     */
    public function setTransitTo($transitTo)
    {
        $this->transitTo = $transitTo;
        return $this;
    }

    /**
     * @return \Ups\Entity\TransitTo
     */
    public function getTransitTo()
    {
        return $this->transitTo;
    }

}
