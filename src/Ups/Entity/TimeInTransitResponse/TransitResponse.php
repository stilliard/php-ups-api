<?php
namespace Ups\Entity\TimeInTransitResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  TransitResponse implements NodeInterface
{
    /**
     * @var \Ups\Entity\TimeInTransitResponse\TransitFrom
     */
    private $transitFrom;

    /**
     * @var \Ups\Entity\TimeInTransitResponse\TransitTo
     */
    private $transitTo;

    /**
     * @var string
     */
    private $pickupDate;

    /**
     * @var \Ups\Entity\TimeInTransitResponse\DocumentsOnlyIndicator
     */
    private $documentsOnlyIndicator;

    /**
     * @var string
     */
    private $autoDutyCode;

    /**
     * @var \Ups\Entity\TimeInTransitResponse\ShipmentWeight
     */
    private $shipmentWeight;

    /**
     * @var \Ups\Entity\TimeInTransitResponse\InvoiceLineTotal
     */
    private $invoiceLineTotal;

    /**
     * @var array
     */
    private $serviceSummary;

    /**
     * @var string
     */
    private $maximumListSize;

    /**
     * @var string
     */
    private $disclaimer;

    function __construct($attributes = null)
    {
        $this->setTransitFrom(new TransitFrom());
        $this->setTransitTo(new TransitTo());
        $this->setServiceSummary = array();

        if (null !== $attributes) {
            if (isset($attributes->TransitFrom)) {
                $this->setTransitFrom(new TransitFrom($attributes->TransitFrom));
            }
            if (isset($attributes->TransitTo)) {
                $this->setTransitTo(new TransitTo($attributes->TransitTo));
            }
            if (isset($attributes->PickupDate)) {
                $this->setPickupDate($attributes->PickupDate);
            }
            if (isset($attributes->DocumentsOnlyIndicator)) {
                $this->setDocumentsOnlyIndicator(new DocumentsOnlyIndicator($attributes->DocumentsOnlyIndicator));
            }
            if (isset($attributes->AutoDutyCode)) {
                $this->setAutoDutyCode($attributes->AutoDutyCode);
            }
            if (isset($attributes->ShipmentWeight)) {
                $this->setShipmentWeight(new ShipmentWeight($attributes->ShipmentWeight));
            }
            if (isset($attributes->InvoiceLineTotal)) {
                $this->setInvoiceLineTotal(new InvoiceLineTotal($attributes->InvoiceLineTotal));
            }
            if (isset($attributes->ServiceSummary)) {
                $serviceSummary = $this->getServiceSummary();
                foreach ($attributes->ServiceSummary as $item) {
                    $serviceSummary[] = new ServiceSummary($item);
                }
                $this->setServiceSummary($serviceSummary);
            }
            if (isset($attributes->MaximumListSize)) {
                $this->setMaximumListSize($attributes->MaximumListSize);
            }
            if (isset($attributes->Disclaimer)) {
                $this->setDisclaimer($attributes->Disclaimer);
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

        $node = $document->createElement('TransitResponse');
        $node->appendChild($this->getTransitFrom()->toNode($document));
        $node->appendChild($this->getTransitTo()->toNode($document));
        $node->appendChild($document->createElement('PickupDate', $this->getPickupDate()));
        if (null !== $this->getDocumentsOnlyIndicator()) {
            $node->appendChild($this->getDocumentsOnlyIndicator()->toNode($document));
        }
        if (null !== $this->getAutoDutyCode()) {
            $node->appendChild($document->createElement('AutoDutyCode', $this->getAutoDutyCode()));
        }
        if (null !== $this->getShipmentWeight()) {
            $node->appendChild($this->getShipmentWeight()->toNode($document));
        }
        if (null !== $this->getInvoiceLineTotal()) {
            $node->appendChild($this->getInvoiceLineTotal()->toNode($document));
        }
        if (count($this->getServiceSummary()) > 0) {
            foreach ($this->getServiceSummary() as $ServiceSummary) {
                $node->appendChild($ServiceSummary->toNode($document));
            }
        }
        if (null !== $this->getMaximumListSize()) {
            $node->appendChild($document->createElement('MaximumListSize', $this->getMaximumListSize()));
        }
        if (null !== $this->getDisclaimer()) {
            $node->appendChild($document->createElement('Disclaimer', $this->getDisclaimer()));
        }
        return $node;
    }

    /**
     * @param \Ups\Entity\TimeInTransitResponse\TransitFrom $transitFrom
     * @return $this
     */
    public function setTransitFrom($transitFrom)
    {
        $this->transitFrom = $transitFrom;
        return $this;
    }

    /**
     * @return \Ups\Entity\TimeInTransitResponse\TransitFrom
     */
    public function getTransitFrom()
    {
        return $this->transitFrom;
    }

    /**
     * @param \Ups\Entity\TimeInTransitResponse\TransitTo $transitTo
     * @return $this
     */
    public function setTransitTo($transitTo)
    {
        $this->transitTo = $transitTo;
        return $this;
    }

    /**
     * @return \Ups\Entity\TimeInTransitResponse\TransitTo
     */
    public function getTransitTo()
    {
        return $this->transitTo;
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
     * @param \Ups\Entity\TimeInTransitResponse\DocumentsOnlyIndicator $documentsOnlyIndicator
     * @return $this
     */
    public function setDocumentsOnlyIndicator($documentsOnlyIndicator)
    {
        $this->documentsOnlyIndicator = $documentsOnlyIndicator;
        return $this;
    }

    /**
     * @return \Ups\Entity\TimeInTransitResponse\DocumentsOnlyIndicator
     */
    public function getDocumentsOnlyIndicator()
    {
        return $this->documentsOnlyIndicator;
    }

    /**
     * @param string $autoDutyCode
     * @return $this
     */
    public function setAutoDutyCode($autoDutyCode)
    {
        $this->autoDutyCode = $autoDutyCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getAutoDutyCode()
    {
        return $this->autoDutyCode;
    }

    /**
     * @param \Ups\Entity\TimeInTransitResponse\ShipmentWeight $shipmentWeight
     * @return $this
     */
    public function setShipmentWeight($shipmentWeight)
    {
        $this->shipmentWeight = $shipmentWeight;
        return $this;
    }

    /**
     * @return \Ups\Entity\TimeInTransitResponse\ShipmentWeight
     */
    public function getShipmentWeight()
    {
        return $this->shipmentWeight;
    }

    /**
     * @param \Ups\Entity\TimeInTransitResponse\InvoiceLineTotal $invoiceLineTotal
     * @return $this
     */
    public function setInvoiceLineTotal($invoiceLineTotal)
    {
        $this->invoiceLineTotal = $invoiceLineTotal;
        return $this;
    }

    /**
     * @return \Ups\Entity\TimeInTransitResponse\InvoiceLineTotal
     */
    public function getInvoiceLineTotal()
    {
        return $this->invoiceLineTotal;
    }

    /**
     * @param array $serviceSummary
     * @return $this
     */
    public function setServiceSummary($serviceSummary)
    {
        $this->serviceSummary = $serviceSummary;
        return $this;
    }

    /**
     * @return array
     */
    public function getServiceSummary()
    {
        return $this->serviceSummary;
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

    /**
     * @param string $disclaimer
     * @return $this
     */
    public function setDisclaimer($disclaimer)
    {
        $this->disclaimer = $disclaimer;
        return $this;
    }

    /**
     * @return string
     */
    public function getDisclaimer()
    {
        return $this->disclaimer;
    }

}
