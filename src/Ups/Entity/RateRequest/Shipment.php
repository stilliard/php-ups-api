<?php
namespace Ups\Entity\RateRequest;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  Shipment implements NodeInterface
{
    /**
     * @var \Ups\Entity\RateRequest\Shipper
     */
    private $shipper;

    /**
     * @var \Ups\Entity\RateRequest\ShipTo
     */
    private $shipTo;

    /**
     * @var \Ups\Entity\RateRequest\ShipFrom
     */
    private $shipFrom;

    /**
     * @var \Ups\Entity\RateRequest\Service
     */
    private $service;

    /**
     * @var string
     */
    private $documentsOnly;

    /**
     * @var string
     */
    private $numOfPieces;

    /**
     * @var array
     */
    private $package;

    /**
     * @var \Ups\Entity\RateRequest\ShipmentServiceOptions
     */
    private $shipmentServiceOptions;

    /**
     * @var \Ups\Entity\RateRequest\RateInformation
     */
    private $rateInformation;

    /**
     * @var \Ups\Entity\RateRequest\InvoiceLineTotal
     */
    private $invoiceLineTotal;

    /**
     * @var string
     */
    private $itemizedChargesRequestedIndicator;

    function __construct($attributes = null)
    {
        $this->setShipper(new Shipper());
        $this->setShipTo(new ShipTo());

        if (null !== $attributes) {
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
            if (isset($attributes->DocumentsOnly)) {
                $this->setDocumentsOnly($attributes->DocumentsOnly);
            }
            if (isset($attributes->NumOfPieces)) {
                $this->setNumOfPieces($attributes->NumOfPieces);
            }
            if (isset($attributes->Package)) {
                $package = $this->getPackage();
                foreach ($attributes->Package as $item) {
                    $package[] = new Package($item);
                }
                $this->setPackage($package);
            }
            if (isset($attributes->ShipmentServiceOptions)) {
                $this->setShipmentServiceOptions(new ShipmentServiceOptions($attributes->ShipmentServiceOptions));
            }
            if (isset($attributes->RateInformation)) {
                $this->setRateInformation(new RateInformation($attributes->RateInformation));
            }
            if (isset($attributes->InvoiceLineTotal)) {
                $this->setInvoiceLineTotal(new InvoiceLineTotal($attributes->InvoiceLineTotal));
            }
            if (isset($attributes->ItemizedChargesRequestedIndicator)) {
                $this->setItemizedChargesRequestedIndicator($attributes->ItemizedChargesRequestedIndicator);
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
        $node->appendChild($this->getShipper()->toNode($document));
        $node->appendChild($this->getShipTo()->toNode($document));
        if (null !== $this->getShipFrom()) {
            $node->appendChild($this->getShipFrom()->toNode($document));
        }
        if (null !== $this->getService()) {
            $node->appendChild($this->getService()->toNode($document));
        }
        if (null !== $this->getDocumentsOnly()) {
            $node->appendChild($document->createElement('DocumentsOnly', $this->getDocumentsOnly()));
        }
        if (null !== $this->getNumOfPieces()) {
            $node->appendChild($document->createElement('NumOfPieces', $this->getNumOfPieces()));
        }
        if (null !== $this->getPackage()) {
            if (count($this->getPackage()) > 0) {
                foreach ($this->getPackage() as $Package) {
                    $node->appendChild($Package->toNode($document));
                }
            }
        }
        if (null !== $this->getShipmentServiceOptions()) {
            $node->appendChild($this->getShipmentServiceOptions()->toNode($document));
        }
        if (null !== $this->getRateInformation()) {
            $node->appendChild($this->getRateInformation()->toNode($document));
        }
        if (null !== $this->getInvoiceLineTotal()) {
            $node->appendChild($this->getInvoiceLineTotal()->toNode($document));
        }
        if (null !== $this->getItemizedChargesRequestedIndicator()) {
            $node->appendChild($document->createElement('ItemizedChargesRequestedIndicator', $this->getItemizedChargesRequestedIndicator()));
        }
        return $node;
    }

    /**
     * @param \Ups\Entity\RateRequest\Shipper $shipper
     * @return $this
     */
    public function setShipper($shipper)
    {
        $this->shipper = $shipper;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateRequest\Shipper
     */
    public function getShipper()
    {
        return $this->shipper;
    }

    /**
     * @param \Ups\Entity\RateRequest\ShipTo $shipTo
     * @return $this
     */
    public function setShipTo($shipTo)
    {
        $this->shipTo = $shipTo;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateRequest\ShipTo
     */
    public function getShipTo()
    {
        return $this->shipTo;
    }

    /**
     * @param \Ups\Entity\RateRequest\ShipFrom $shipFrom
     * @return $this
     */
    public function setShipFrom($shipFrom)
    {
        $this->shipFrom = $shipFrom;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateRequest\ShipFrom
     */
    public function getShipFrom()
    {
        return $this->shipFrom;
    }

    /**
     * @param \Ups\Entity\RateRequest\Service $service
     * @return $this
     */
    public function setService($service)
    {
        $this->service = $service;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateRequest\Service
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param string $documentsOnly
     * @return $this
     */
    public function setDocumentsOnly($documentsOnly)
    {
        $this->documentsOnly = $documentsOnly;
        return $this;
    }

    /**
     * @return string
     */
    public function getDocumentsOnly()
    {
        return $this->documentsOnly;
    }

    /**
     * @param string $numOfPieces
     * @return $this
     */
    public function setNumOfPieces($numOfPieces)
    {
        $this->numOfPieces = $numOfPieces;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumOfPieces()
    {
        return $this->numOfPieces;
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
     * @param \Ups\Entity\RateRequest\ShipmentServiceOptions $shipmentServiceOptions
     * @return $this
     */
    public function setShipmentServiceOptions($shipmentServiceOptions)
    {
        $this->shipmentServiceOptions = $shipmentServiceOptions;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateRequest\ShipmentServiceOptions
     */
    public function getShipmentServiceOptions()
    {
        return $this->shipmentServiceOptions;
    }

    /**
     * @param \Ups\Entity\RateRequest\RateInformation $rateInformation
     * @return $this
     */
    public function setRateInformation($rateInformation)
    {
        $this->rateInformation = $rateInformation;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateRequest\RateInformation
     */
    public function getRateInformation()
    {
        return $this->rateInformation;
    }

    /**
     * @param \Ups\Entity\RateRequest\InvoiceLineTotal $invoiceLineTotal
     * @return $this
     */
    public function setInvoiceLineTotal($invoiceLineTotal)
    {
        $this->invoiceLineTotal = $invoiceLineTotal;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateRequest\InvoiceLineTotal
     */
    public function getInvoiceLineTotal()
    {
        return $this->invoiceLineTotal;
    }

    /**
     * @param string $itemizedChargesRequestedIndicator
     * @return $this
     */
    public function setItemizedChargesRequestedIndicator($itemizedChargesRequestedIndicator)
    {
        $this->itemizedChargesRequestedIndicator = $itemizedChargesRequestedIndicator;
        return $this;
    }

    /**
     * @return string
     */
    public function getItemizedChargesRequestedIndicator()
    {
        return $this->itemizedChargesRequestedIndicator;
    }

}
