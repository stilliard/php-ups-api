<?php
namespace Ups\Entity\RateRequest;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  PackageServiceOptions implements NodeInterface
{
    /**
     * @var \Ups\Entity\RateRequest\InsuredValue
     */
    private $insuredValue;

    /**
     * @var \Ups\Entity\RateRequest\COD
     */
    private $cOD;

    /**
     * @var \Ups\Entity\RateRequest\DeliveryConfirmation
     */
    private $deliveryConfirmation;

    /**
     * @var \Ups\Entity\RateRequest\ShipperDeclaredValue
     */
    private $shipperDeclaredValue;

    /**
     * @var string
     */
    private $proactiveIndicator;

    /**
     * @var \Ups\Entity\RateRequest\Insurance
     */
    private $insurance;

    /**
     * @var \Ups\Entity\RateRequest\VerbalConfirmation
     */
    private $verbalConfirmation;

    /**
     * @var string
     */
    private $uPSPremiumCareIndicator;

    /**
     * @var \Ups\Entity\RateRequest\DryIce
     */
    private $dryIce;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->InsuredValue)) {
                $this->setInsuredValue(new InsuredValue($attributes->InsuredValue));
            }
            if (isset($attributes->COD)) {
                $this->setCOD(new COD($attributes->COD));
            }
            if (isset($attributes->DeliveryConfirmation)) {
                $this->setDeliveryConfirmation(new DeliveryConfirmation($attributes->DeliveryConfirmation));
            }
            if (isset($attributes->ShipperDeclaredValue)) {
                $this->setShipperDeclaredValue(new ShipperDeclaredValue($attributes->ShipperDeclaredValue));
            }
            if (isset($attributes->ProactiveIndicator)) {
                $this->setProactiveIndicator($attributes->ProactiveIndicator);
            }
            if (isset($attributes->Insurance)) {
                $this->setInsurance(new Insurance($attributes->Insurance));
            }
            if (isset($attributes->VerbalConfirmation)) {
                $this->setVerbalConfirmation(new VerbalConfirmation($attributes->VerbalConfirmation));
            }
            if (isset($attributes->UPSPremiumCareIndicator)) {
                $this->setUPSPremiumCareIndicator($attributes->UPSPremiumCareIndicator);
            }
            if (isset($attributes->DryIce)) {
                $this->setDryIce(new DryIce($attributes->DryIce));
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
        if (null !== $this->getInsuredValue()) {
            $node->appendChild($this->getInsuredValue()->toNode($document));
        }
        if (null !== $this->getCOD()) {
            $node->appendChild($this->getCOD()->toNode($document));
        }
        if (null !== $this->getDeliveryConfirmation()) {
            $node->appendChild($this->getDeliveryConfirmation()->toNode($document));
        }
        if (null !== $this->getShipperDeclaredValue()) {
            $node->appendChild($this->getShipperDeclaredValue()->toNode($document));
        }
        if (null !== $this->getProactiveIndicator()) {
            $node->appendChild($document->createElement('ProactiveIndicator', $this->getProactiveIndicator()));
        }
        if (null !== $this->getInsurance()) {
            $node->appendChild($this->getInsurance()->toNode($document));
        }
        if (null !== $this->getVerbalConfirmation()) {
            $node->appendChild($this->getVerbalConfirmation()->toNode($document));
        }
        if (null !== $this->getUPSPremiumCareIndicator()) {
            $node->appendChild($document->createElement('UPSPremiumCareIndicator', $this->getUPSPremiumCareIndicator()));
        }
        if (null !== $this->getDryIce()) {
            $node->appendChild($this->getDryIce()->toNode($document));
        }
        return $node;
    }

    /**
     * @param \Ups\Entity\RateRequest\InsuredValue $insuredValue
     * @return $this
     */
    public function setInsuredValue($insuredValue)
    {
        $this->insuredValue = $insuredValue;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateRequest\InsuredValue
     */
    public function getInsuredValue()
    {
        return $this->insuredValue;
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
     * @param \Ups\Entity\RateRequest\ShipperDeclaredValue $shipperDeclaredValue
     * @return $this
     */
    public function setShipperDeclaredValue($shipperDeclaredValue)
    {
        $this->shipperDeclaredValue = $shipperDeclaredValue;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateRequest\ShipperDeclaredValue
     */
    public function getShipperDeclaredValue()
    {
        return $this->shipperDeclaredValue;
    }

    /**
     * @param string $proactiveIndicator
     * @return $this
     */
    public function setProactiveIndicator($proactiveIndicator)
    {
        $this->proactiveIndicator = $proactiveIndicator;
        return $this;
    }

    /**
     * @return string
     */
    public function getProactiveIndicator()
    {
        return $this->proactiveIndicator;
    }

    /**
     * @param \Ups\Entity\RateRequest\Insurance $insurance
     * @return $this
     */
    public function setInsurance($insurance)
    {
        $this->insurance = $insurance;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateRequest\Insurance
     */
    public function getInsurance()
    {
        return $this->insurance;
    }

    /**
     * @param \Ups\Entity\RateRequest\VerbalConfirmation $verbalConfirmation
     * @return $this
     */
    public function setVerbalConfirmation($verbalConfirmation)
    {
        $this->verbalConfirmation = $verbalConfirmation;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateRequest\VerbalConfirmation
     */
    public function getVerbalConfirmation()
    {
        return $this->verbalConfirmation;
    }

    /**
     * @param string $uPSPremiumCareIndicator
     * @return $this
     */
    public function setUPSPremiumCareIndicator($uPSPremiumCareIndicator)
    {
        $this->uPSPremiumCareIndicator = $uPSPremiumCareIndicator;
        return $this;
    }

    /**
     * @return string
     */
    public function getUPSPremiumCareIndicator()
    {
        return $this->uPSPremiumCareIndicator;
    }

    /**
     * @param \Ups\Entity\RateRequest\DryIce $dryIce
     * @return $this
     */
    public function setDryIce($dryIce)
    {
        $this->dryIce = $dryIce;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateRequest\DryIce
     */
    public function getDryIce()
    {
        return $this->dryIce;
    }

}
