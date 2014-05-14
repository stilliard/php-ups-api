<?php
namespace Ups\Entity;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class TimeInTransitResponse implements NodeInterface
{
    /**
     * @var string
     */
    private $pickupDate;

    /**
     * @var \Ups\Entity\TransitFrom
     */
    private $transitFrom;

    /**
     * @var \Ups\Entity\TransitTo
     */
    private $transitTo;

    /**
     * @var string
     */
    private $documentsOnlyIndicator;

    /**
     * @var string
     */
    private $autoDutyCode;

    /**
     * @var \Ups\Entity\ShipmentWeight
     */
    private $shipmentWeight;

    /**
     * @var \Ups\Entity\InvoiceLineTotal
     */
    private $invoiceLineTotal;

    /**
     * @var string
     */
    private $disclaimer;

    /**
     * @var array
     */
    private $serviceSummary;

    /**
     * @var string
     */
    private $maximumListSize;

    function __construct($attributes = null)
    {
        $this->setTransitFrom(new TransitFrom());
        $this->setTransitTo(new TransitTo());
        $this->setShipmentWeight(new ShipmentWeight());
        $this->setInvoiceLineTotal(new Charges());
        $this->setServiceSummary(array());

        if (null !== $attributes) {
            if (isset($attributes->PickupDate)) {
                $this->setPickupDate($attributes->PickupDate);
            }
            if (isset($attributes->TransitFrom)) {
                $this->setTransitFrom(new TransitFrom($attributes->TransitFrom));
            }
            if (isset($attributes->TransitTo)) {
                $this->setTransitTo(new TransitTo($attributes->TransitTo));
            }
            if (isset($attributes->DocumentsOnlyIndicator)) {
                $this->setDocumentsOnlyIndicator($attributes->DocumentsOnlyIndicator);
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
            if (isset($attributes->Disclaimer)) {
                $this->setDisclaimer($attributes->Disclaimer);
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

        $node = $document->createElement('TimeInTransitResponse');
        $node->appendChild($document->createElement('PickupDate', $this->getPickupDate()));
        $node->appendChild($this->getTransitFrom()->toNode($document));
        $node->appendChild($this->getTransitTo()->toNode($document));
        $node->appendChild($document->createElement('DocumentsOnlyIndicator', $this->getDocumentsOnlyIndicator()));
        $node->appendChild($document->createElement('AutoDutyCode', $this->getAutoDutyCode()));
        $node->appendChild($this->getShipmentWeight()->toNode($document));
        $node->appendChild($this->getInvoiceLineTotal()->toNode($document));
        if (count($this->getServiceSummary()) > 0) {
            foreach ($this->getServiceSummary() as $ServiceSummary) {
                $node->appendChild($ServiceSummary->toNode($document));
            }
        }
        $node->appendChild($document->createElement('MaximumListSize', $this->getMaximumListSize()));
        return $node;
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
