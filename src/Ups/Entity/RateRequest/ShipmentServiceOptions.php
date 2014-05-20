<?php
namespace Ups\Entity\RateRequest;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  ShipmentServiceOptions implements NodeInterface
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
     * @var \Ups\Entity\RateRequest\OnCallAir
     */
    private $onCallAir;

    /**
     * @var \Ups\Entity\RateRequest\COD
     */
    private $cOD;

    /**
     * @var string
     */
    private $returnOfDocumentIndicator;

    /**
     * @var \Ups\Entity\RateRequest\DeliveryConfirmation
     */
    private $deliveryConfirmation;

    /**
     * @var string
     */
    private $uPScarbonneutralIndicator;

    /**
     * @var string
     */
    private $certificateOfOriginIndicator;

    /**
     * @var \Ups\Entity\RateRequest\PickupOptions
     */
    private $pickupOptions;

    /**
     * @var \Ups\Entity\RateRequest\DeliveryOptions
     */
    private $deliveryOptions;

    /**
     * @var \Ups\Entity\RateRequest\RestrictedArticles
     */
    private $restrictedArticles;

    /**
     * @var string
     */
    private $shipperExportDeclarationIndicator;

    /**
     * @var string
     */
    private $commercialInvoiceRemovalIndicator;

    /**
     * @var \Ups\Entity\RateRequest\ImportControl
     */
    private $importControl;

    /**
     * @var \Ups\Entity\RateRequest\ReturnService
     */
    private $returnService;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->SaturdayPickup)) {
                $this->setSaturdayPickup($attributes->SaturdayPickup);
            }
            if (isset($attributes->SaturdayDelivery)) {
                $this->setSaturdayDelivery($attributes->SaturdayDelivery);
            }
            if (isset($attributes->OnCallAir)) {
                $this->setOnCallAir(new OnCallAir($attributes->OnCallAir));
            }
            if (isset($attributes->COD)) {
                $this->setCOD(new COD($attributes->COD));
            }
            if (isset($attributes->ReturnOfDocumentIndicator)) {
                $this->setReturnOfDocumentIndicator($attributes->ReturnOfDocumentIndicator);
            }
            if (isset($attributes->DeliveryConfirmation)) {
                $this->setDeliveryConfirmation(new DeliveryConfirmation($attributes->DeliveryConfirmation));
            }
            if (isset($attributes->UPScarbonneutralIndicator)) {
                $this->setUPScarbonneutralIndicator($attributes->UPScarbonneutralIndicator);
            }
            if (isset($attributes->CertificateOfOriginIndicator)) {
                $this->setCertificateOfOriginIndicator($attributes->CertificateOfOriginIndicator);
            }
            if (isset($attributes->PickupOptions)) {
                $this->setPickupOptions(new PickupOptions($attributes->PickupOptions));
            }
            if (isset($attributes->DeliveryOptions)) {
                $this->setDeliveryOptions(new DeliveryOptions($attributes->DeliveryOptions));
            }
            if (isset($attributes->RestrictedArticles)) {
                $this->setRestrictedArticles(new RestrictedArticles($attributes->RestrictedArticles));
            }
            if (isset($attributes->ShipperExportDeclarationIndicator)) {
                $this->setShipperExportDeclarationIndicator($attributes->ShipperExportDeclarationIndicator);
            }
            if (isset($attributes->CommercialInvoiceRemovalIndicator)) {
                $this->setCommercialInvoiceRemovalIndicator($attributes->CommercialInvoiceRemovalIndicator);
            }
            if (isset($attributes->ImportControl)) {
                $this->setImportControl(new ImportControl($attributes->ImportControl));
            }
            if (isset($attributes->ReturnService)) {
                $this->setReturnService(new ReturnService($attributes->ReturnService));
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
            $node->appendChild($document->createElement('SaturdayPickup', $this->getSaturdayPickup()));
        }
        if (null !== $this->getSaturdayDelivery()) {
            $node->appendChild($document->createElement('SaturdayDelivery', $this->getSaturdayDelivery()));
        }
        if (null !== $this->getOnCallAir()) {
            $node->appendChild($this->getOnCallAir()->toNode($document));
        }
        if (null !== $this->getCOD()) {
            $node->appendChild($this->getCOD()->toNode($document));
        }
        if (null !== $this->getReturnOfDocumentIndicator()) {
            $node->appendChild($document->createElement('ReturnOfDocumentIndicator', $this->getReturnOfDocumentIndicator()));
        }
        if (null !== $this->getDeliveryConfirmation()) {
            $node->appendChild($this->getDeliveryConfirmation()->toNode($document));
        }
        if (null !== $this->getUPScarbonneutralIndicator()) {
            $node->appendChild($document->createElement('UPScarbonneutralIndicator', $this->getUPScarbonneutralIndicator()));
        }
        if (null !== $this->getCertificateOfOriginIndicator()) {
            $node->appendChild($document->createElement('CertificateOfOriginIndicator', $this->getCertificateOfOriginIndicator()));
        }
        if (null !== $this->getPickupOptions()) {
            $node->appendChild($this->getPickupOptions()->toNode($document));
        }
        if (null !== $this->getDeliveryOptions()) {
            $node->appendChild($this->getDeliveryOptions()->toNode($document));
        }
        if (null !== $this->getRestrictedArticles()) {
            $node->appendChild($this->getRestrictedArticles()->toNode($document));
        }
        if (null !== $this->getShipperExportDeclarationIndicator()) {
            $node->appendChild($document->createElement('ShipperExportDeclarationIndicator', $this->getShipperExportDeclarationIndicator()));
        }
        if (null !== $this->getCommercialInvoiceRemovalIndicator()) {
            $node->appendChild($document->createElement('CommercialInvoiceRemovalIndicator', $this->getCommercialInvoiceRemovalIndicator()));
        }
        if (null !== $this->getImportControl()) {
            $node->appendChild($this->getImportControl()->toNode($document));
        }
        if (null !== $this->getReturnService()) {
            $node->appendChild($this->getReturnService()->toNode($document));
        }
        return $node;
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
     * @param \Ups\Entity\RateRequest\OnCallAir $onCallAir
     * @return $this
     */
    public function setOnCallAir($onCallAir)
    {
        $this->onCallAir = $onCallAir;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateRequest\OnCallAir
     */
    public function getOnCallAir()
    {
        return $this->onCallAir;
    }

    /**
     * @param \Ups\Entity\RateRequest\COD $cOD
     * @return $this
     */
    public function setCOD($cOD)
    {
        $this->cOD = $cOD;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateRequest\COD
     */
    public function getCOD()
    {
        return $this->cOD;
    }

    /**
     * @param string $returnOfDocumentIndicator
     * @return $this
     */
    public function setReturnOfDocumentIndicator($returnOfDocumentIndicator)
    {
        $this->returnOfDocumentIndicator = $returnOfDocumentIndicator;
        return $this;
    }

    /**
     * @return string
     */
    public function getReturnOfDocumentIndicator()
    {
        return $this->returnOfDocumentIndicator;
    }

    /**
     * @param \Ups\Entity\RateRequest\DeliveryConfirmation $deliveryConfirmation
     * @return $this
     */
    public function setDeliveryConfirmation($deliveryConfirmation)
    {
        $this->deliveryConfirmation = $deliveryConfirmation;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateRequest\DeliveryConfirmation
     */
    public function getDeliveryConfirmation()
    {
        return $this->deliveryConfirmation;
    }

    /**
     * @param string $uPScarbonneutralIndicator
     * @return $this
     */
    public function setUPScarbonneutralIndicator($uPScarbonneutralIndicator)
    {
        $this->uPScarbonneutralIndicator = $uPScarbonneutralIndicator;
        return $this;
    }

    /**
     * @return string
     */
    public function getUPScarbonneutralIndicator()
    {
        return $this->uPScarbonneutralIndicator;
    }

    /**
     * @param string $certificateOfOriginIndicator
     * @return $this
     */
    public function setCertificateOfOriginIndicator($certificateOfOriginIndicator)
    {
        $this->certificateOfOriginIndicator = $certificateOfOriginIndicator;
        return $this;
    }

    /**
     * @return string
     */
    public function getCertificateOfOriginIndicator()
    {
        return $this->certificateOfOriginIndicator;
    }

    /**
     * @param \Ups\Entity\RateRequest\PickupOptions $pickupOptions
     * @return $this
     */
    public function setPickupOptions($pickupOptions)
    {
        $this->pickupOptions = $pickupOptions;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateRequest\PickupOptions
     */
    public function getPickupOptions()
    {
        return $this->pickupOptions;
    }

    /**
     * @param \Ups\Entity\RateRequest\DeliveryOptions $deliveryOptions
     * @return $this
     */
    public function setDeliveryOptions($deliveryOptions)
    {
        $this->deliveryOptions = $deliveryOptions;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateRequest\DeliveryOptions
     */
    public function getDeliveryOptions()
    {
        return $this->deliveryOptions;
    }

    /**
     * @param \Ups\Entity\RateRequest\RestrictedArticles $restrictedArticles
     * @return $this
     */
    public function setRestrictedArticles($restrictedArticles)
    {
        $this->restrictedArticles = $restrictedArticles;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateRequest\RestrictedArticles
     */
    public function getRestrictedArticles()
    {
        return $this->restrictedArticles;
    }

    /**
     * @param string $shipperExportDeclarationIndicator
     * @return $this
     */
    public function setShipperExportDeclarationIndicator($shipperExportDeclarationIndicator)
    {
        $this->shipperExportDeclarationIndicator = $shipperExportDeclarationIndicator;
        return $this;
    }

    /**
     * @return string
     */
    public function getShipperExportDeclarationIndicator()
    {
        return $this->shipperExportDeclarationIndicator;
    }

    /**
     * @param string $commercialInvoiceRemovalIndicator
     * @return $this
     */
    public function setCommercialInvoiceRemovalIndicator($commercialInvoiceRemovalIndicator)
    {
        $this->commercialInvoiceRemovalIndicator = $commercialInvoiceRemovalIndicator;
        return $this;
    }

    /**
     * @return string
     */
    public function getCommercialInvoiceRemovalIndicator()
    {
        return $this->commercialInvoiceRemovalIndicator;
    }

    /**
     * @param \Ups\Entity\RateRequest\ImportControl $importControl
     * @return $this
     */
    public function setImportControl($importControl)
    {
        $this->importControl = $importControl;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateRequest\ImportControl
     */
    public function getImportControl()
    {
        return $this->importControl;
    }

    /**
     * @param \Ups\Entity\RateRequest\ReturnService $returnService
     * @return $this
     */
    public function setReturnService($returnService)
    {
        $this->returnService = $returnService;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateRequest\ReturnService
     */
    public function getReturnService()
    {
        return $this->returnService;
    }

}
