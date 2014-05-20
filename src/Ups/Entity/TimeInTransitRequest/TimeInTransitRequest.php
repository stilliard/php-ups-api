<?php
namespace Ups\Entity\TimeInTransitRequest;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  TimeInTransitRequest implements NodeInterface
{
    /**
     * @var \Ups\Entity\TimeInTransitRequest\Request
     */
    private $request;

    /**
     * @var \Ups\Entity\TimeInTransitRequest\TransitFrom
     */
    private $transitFrom;

    /**
     * @var \Ups\Entity\TimeInTransitRequest\TransitTo
     */
    private $transitTo;

    /**
     * @var \Ups\Entity\TimeInTransitRequest\ShipmentWeight
     */
    private $shipmentWeight;

    /**
     * @var string
     */
    private $totalPackagesInShipment;

    /**
     * @var string
     */
    private $pickupDate;

    /**
     * @var string
     */
    private $time;

    /**
     * @var \Ups\Entity\TimeInTransitRequest\InvoiceLineTotal
     */
    private $invoiceLineTotal;

    /**
     * @var string
     */
    private $documentsOnlyIndicator;

    /**
     * @var string
     */
    private $maximumListSize;

    function __construct($attributes = null)
    {
        $this->setRequest(new Request());
        $this->setTransitFrom(new TransitFrom());
        $this->setTransitTo(new TransitTo());

        if (null !== $attributes) {
            if (isset($attributes->Request)) {
                $this->setRequest(new Request($attributes->Request));
            }
            if (isset($attributes->TransitFrom)) {
                $this->setTransitFrom(new TransitFrom($attributes->TransitFrom));
            }
            if (isset($attributes->TransitTo)) {
                $this->setTransitTo(new TransitTo($attributes->TransitTo));
            }
            if (isset($attributes->ShipmentWeight)) {
                $this->setShipmentWeight(new ShipmentWeight($attributes->ShipmentWeight));
            }
            if (isset($attributes->TotalPackagesInShipment)) {
                $this->setTotalPackagesInShipment($attributes->TotalPackagesInShipment);
            }
            if (isset($attributes->PickupDate)) {
                $this->setPickupDate($attributes->PickupDate);
            }
            if (isset($attributes->Time)) {
                $this->setTime($attributes->Time);
            }
            if (isset($attributes->InvoiceLineTotal)) {
                $this->setInvoiceLineTotal(new InvoiceLineTotal($attributes->InvoiceLineTotal));
            }
            if (isset($attributes->DocumentsOnlyIndicator)) {
                $this->setDocumentsOnlyIndicator($attributes->DocumentsOnlyIndicator);
            }
            if (isset($attributes->MaximumListSize)) {
                $this->setMaximumListSize($attributes->MaximumListSize);
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
        $node->appendChild($this->getRequest()->toNode($document));
        $node->appendChild($this->getTransitFrom()->toNode($document));
        $node->appendChild($this->getTransitTo()->toNode($document));
        if (null !== $this->getShipmentWeight()) {
            $node->appendChild($this->getShipmentWeight()->toNode($document));
        }
        if (null !== $this->getTotalPackagesInShipment()) {
            $node->appendChild($document->createElement('TotalPackagesInShipment', $this->getTotalPackagesInShipment()));
        }
        $node->appendChild($document->createElement('PickupDate', $this->getPickupDate()));
        if (null !== $this->getTime()) {
            $node->appendChild($document->createElement('Time', $this->getTime()));
        }
        if (null !== $this->getInvoiceLineTotal()) {
            $node->appendChild($this->getInvoiceLineTotal()->toNode($document));
        }
        if (null !== $this->getDocumentsOnlyIndicator()) {
            $node->appendChild($document->createElement('DocumentsOnlyIndicator', $this->getDocumentsOnlyIndicator()));
        }
        if (null !== $this->getMaximumListSize()) {
            $node->appendChild($document->createElement('MaximumListSize', $this->getMaximumListSize()));
        }
        return $node;
    }

    /**
     * @param \Ups\Entity\TimeInTransitRequest\Request $request
     * @return $this
     */
    public function setRequest($request)
    {
        $this->request = $request;
        return $this;
    }

    /**
     * @return \Ups\Entity\TimeInTransitRequest\Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param \Ups\Entity\TimeInTransitRequest\TransitFrom $transitFrom
     * @return $this
     */
    public function setTransitFrom($transitFrom)
    {
        $this->transitFrom = $transitFrom;
        return $this;
    }

    /**
     * @return \Ups\Entity\TimeInTransitRequest\TransitFrom
     */
    public function getTransitFrom()
    {
        return $this->transitFrom;
    }

    /**
     * @param \Ups\Entity\TimeInTransitRequest\TransitTo $transitTo
     * @return $this
     */
    public function setTransitTo($transitTo)
    {
        $this->transitTo = $transitTo;
        return $this;
    }

    /**
     * @return \Ups\Entity\TimeInTransitRequest\TransitTo
     */
    public function getTransitTo()
    {
        return $this->transitTo;
    }

    /**
     * @param \Ups\Entity\TimeInTransitRequest\ShipmentWeight $shipmentWeight
     * @return $this
     */
    public function setShipmentWeight($shipmentWeight)
    {
        $this->shipmentWeight = $shipmentWeight;
        return $this;
    }

    /**
     * @return \Ups\Entity\TimeInTransitRequest\ShipmentWeight
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
     * @param string $time
     * @return $this
     */
    public function setTime($time)
    {
        $this->time = $time;
        return $this;
    }

    /**
     * @return string
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param \Ups\Entity\TimeInTransitRequest\InvoiceLineTotal $invoiceLineTotal
     * @return $this
     */
    public function setInvoiceLineTotal($invoiceLineTotal)
    {
        $this->invoiceLineTotal = $invoiceLineTotal;
        return $this;
    }

    /**
     * @return \Ups\Entity\TimeInTransitRequest\InvoiceLineTotal
     */
    public function getInvoiceLineTotal()
    {
        return $this->invoiceLineTotal;
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
     * @param string $maximumListSize
     * @return $this
     */
    public function setMaximumListSize($maximumListSize)
    {
        $this->maximumListSize = $maximumListSize;
        return $this;
    }

    /**
     * @return string
     */
    public function getMaximumListSize()
    {
        return $this->maximumListSize;
    }

}
