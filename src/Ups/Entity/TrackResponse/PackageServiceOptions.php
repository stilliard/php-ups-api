<?php
namespace Ups\Entity\TrackResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  PackageServiceOptions implements NodeInterface
{
    /**
     * @var \Ups\Entity\TrackResponse\COD
     */
    private $cOD;

    /**
     * @var \Ups\Entity\TrackResponse\SignatureRequired
     */
    private $signatureRequired;

    /**
     * @var string
     */
    private $importControl;

    /**
     * @var string
     */
    private $commercialInvoiceRemoval;

    /**
     * @var string
     */
    private $uPScarbonneutral;

    /**
     * @var string
     */
    private $uSPSPICNumber;

    /**
     * @var string
     */
    private $exchangeBased;

    /**
     * @var string
     */
    private $packAndCollect;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->COD)) {
                $this->setCOD(new COD($attributes->COD));
            }
            if (isset($attributes->SignatureRequired)) {
                $this->setSignatureRequired(new SignatureRequired($attributes->SignatureRequired));
            }
            if (isset($attributes->ImportControl)) {
                $this->setImportControl($attributes->ImportControl);
            }
            if (isset($attributes->CommercialInvoiceRemoval)) {
                $this->setCommercialInvoiceRemoval($attributes->CommercialInvoiceRemoval);
            }
            if (isset($attributes->UPScarbonneutral)) {
                $this->setUPScarbonneutral($attributes->UPScarbonneutral);
            }
            if (isset($attributes->USPSPICNumber)) {
                $this->setUSPSPICNumber($attributes->USPSPICNumber);
            }
            if (isset($attributes->ExchangeBased)) {
                $this->setExchangeBased($attributes->ExchangeBased);
            }
            if (isset($attributes->PackAndCollect)) {
                $this->setPackAndCollect($attributes->PackAndCollect);
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

        $node = $document->createElement('PackageServiceOptions');
        if (null !== $this->getCOD()) {
            $node->appendChild($this->getCOD()->toNode($document));
        }
        if (null !== $this->getSignatureRequired()) {
            $node->appendChild($this->getSignatureRequired()->toNode($document));
        }
        if (null !== $this->getImportControl()) {
            $node->appendChild($document->createElement('ImportControl', $this->getImportControl()));
        }
        if (null !== $this->getCommercialInvoiceRemoval()) {
            $node->appendChild($document->createElement('CommercialInvoiceRemoval', $this->getCommercialInvoiceRemoval()));
        }
        if (null !== $this->getUPScarbonneutral()) {
            $node->appendChild($document->createElement('UPScarbonneutral', $this->getUPScarbonneutral()));
        }
        if (null !== $this->getUSPSPICNumber()) {
            $node->appendChild($document->createElement('USPSPICNumber', $this->getUSPSPICNumber()));
        }
        if (null !== $this->getExchangeBased()) {
            $node->appendChild($document->createElement('ExchangeBased', $this->getExchangeBased()));
        }
        if (null !== $this->getPackAndCollect()) {
            $node->appendChild($document->createElement('PackAndCollect', $this->getPackAndCollect()));
        }
        return $node;
    }

    /**
     * @param \Ups\Entity\TrackResponse\COD $cOD
     * @return $this
     */
    public function setCOD($cOD)
    {
        $this->cOD = $cOD;
        return $this;
    }

    /**
     * @return \Ups\Entity\TrackResponse\COD
     */
    public function getCOD()
    {
        return $this->cOD;
    }

    /**
     * @param \Ups\Entity\TrackResponse\SignatureRequired $signatureRequired
     * @return $this
     */
    public function setSignatureRequired($signatureRequired)
    {
        $this->signatureRequired = $signatureRequired;
        return $this;
    }

    /**
     * @return \Ups\Entity\TrackResponse\SignatureRequired
     */
    public function getSignatureRequired()
    {
        return $this->signatureRequired;
    }

    /**
     * @param string $importControl
     * @return $this
     */
    public function setImportControl($importControl)
    {
        $this->importControl = $importControl;
        return $this;
    }

    /**
     * @return string
     */
    public function getImportControl()
    {
        return $this->importControl;
    }

    /**
     * @param string $commercialInvoiceRemoval
     * @return $this
     */
    public function setCommercialInvoiceRemoval($commercialInvoiceRemoval)
    {
        $this->commercialInvoiceRemoval = $commercialInvoiceRemoval;
        return $this;
    }

    /**
     * @return string
     */
    public function getCommercialInvoiceRemoval()
    {
        return $this->commercialInvoiceRemoval;
    }

    /**
     * @param string $uPScarbonneutral
     * @return $this
     */
    public function setUPScarbonneutral($uPScarbonneutral)
    {
        $this->uPScarbonneutral = $uPScarbonneutral;
        return $this;
    }

    /**
     * @return string
     */
    public function getUPScarbonneutral()
    {
        return $this->uPScarbonneutral;
    }

    /**
     * @param string $uSPSPICNumber
     * @return $this
     */
    public function setUSPSPICNumber($uSPSPICNumber)
    {
        $this->uSPSPICNumber = $uSPSPICNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getUSPSPICNumber()
    {
        return $this->uSPSPICNumber;
    }

    /**
     * @param string $exchangeBased
     * @return $this
     */
    public function setExchangeBased($exchangeBased)
    {
        $this->exchangeBased = $exchangeBased;
        return $this;
    }

    /**
     * @return string
     */
    public function getExchangeBased()
    {
        return $this->exchangeBased;
    }

    /**
     * @param string $packAndCollect
     * @return $this
     */
    public function setPackAndCollect($packAndCollect)
    {
        $this->packAndCollect = $packAndCollect;
        return $this;
    }

    /**
     * @return string
     */
    public function getPackAndCollect()
    {
        return $this->packAndCollect;
    }

}
