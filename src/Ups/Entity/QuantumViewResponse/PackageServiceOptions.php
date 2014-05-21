<?php
namespace Ups\Entity\QuantumViewResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  PackageServiceOptions implements NodeInterface
{
    /**
     * @var \Ups\Entity\QuantumViewResponse\COD
     */
    private $cOD;

    /**
     * @var \Ups\Entity\QuantumViewResponse\InsuredValue
     */
    private $insuredValue;

    /**
     * @var string
     */
    private $earliestDeliveryTime;

    /**
     * @var string
     */
    private $hazardousMaterialsCode;

    /**
     * @var \Ups\Entity\QuantumViewResponse\HoldForPickup
     */
    private $holdForPickup;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->COD)) {
                $this->setCOD(new COD($attributes->COD));
            }
            if (isset($attributes->InsuredValue)) {
                $this->setInsuredValue(new InsuredValue($attributes->InsuredValue));
            }
            if (isset($attributes->EarliestDeliveryTime)) {
                $this->setEarliestDeliveryTime($attributes->EarliestDeliveryTime);
            }
            if (isset($attributes->HazardousMaterialsCode)) {
                $this->setHazardousMaterialsCode($attributes->HazardousMaterialsCode);
            }
            if (isset($attributes->HoldForPickup)) {
                $this->setHoldForPickup(new HoldForPickup($attributes->HoldForPickup));
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
        if (null !== $this->getInsuredValue()) {
            $node->appendChild($this->getInsuredValue()->toNode($document));
        }
        if (null !== $this->getEarliestDeliveryTime()) {
            $node->appendChild($document->createElement('EarliestDeliveryTime', $this->getEarliestDeliveryTime()));
        }
        if (null !== $this->getHazardousMaterialsCode()) {
            $node->appendChild($document->createElement('HazardousMaterialsCode', $this->getHazardousMaterialsCode()));
        }
        if (null !== $this->getHoldForPickup()) {
            $node->appendChild($this->getHoldForPickup()->toNode($document));
        }
        return $node;
    }

    /**
     * @param \Ups\Entity\QuantumViewResponse\COD $cOD
     * @return $this
     */
    public function setCOD($cOD)
    {
        $this->cOD = $cOD;
        return $this;
    }

    /**
     * @return \Ups\Entity\QuantumViewResponse\COD
     */
    public function getCOD()
    {
        return $this->cOD;
    }

    /**
     * @param \Ups\Entity\QuantumViewResponse\InsuredValue $insuredValue
     * @return $this
     */
    public function setInsuredValue($insuredValue)
    {
        $this->insuredValue = $insuredValue;
        return $this;
    }

    /**
     * @return \Ups\Entity\QuantumViewResponse\InsuredValue
     */
    public function getInsuredValue()
    {
        return $this->insuredValue;
    }

    /**
     * @param string $earliestDeliveryTime
     * @return $this
     */
    public function setEarliestDeliveryTime($earliestDeliveryTime)
    {
        $this->earliestDeliveryTime = $earliestDeliveryTime;
        return $this;
    }

    /**
     * @return string
     */
    public function getEarliestDeliveryTime()
    {
        return $this->earliestDeliveryTime;
    }

    /**
     * @param string $hazardousMaterialsCode
     * @return $this
     */
    public function setHazardousMaterialsCode($hazardousMaterialsCode)
    {
        $this->hazardousMaterialsCode = $hazardousMaterialsCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getHazardousMaterialsCode()
    {
        return $this->hazardousMaterialsCode;
    }

    /**
     * @param \Ups\Entity\QuantumViewResponse\HoldForPickup $holdForPickup
     * @return $this
     */
    public function setHoldForPickup($holdForPickup)
    {
        $this->holdForPickup = $holdForPickup;
        return $this;
    }

    /**
     * @return \Ups\Entity\QuantumViewResponse\HoldForPickup
     */
    public function getHoldForPickup()
    {
        return $this->holdForPickup;
    }

}
