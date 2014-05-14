<?php
namespace Ups\Entity;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class PackageServiceOptions implements NodeInterface
{
    /**
     * @var \Ups\Entity\COD
     */
    private $cod;

    /**
     * @var \Ups\Entity\InsuredValue
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
     * @var string
     */
    private $holdForPickup;


    function __construct($attributes = null)
    {
        $this->setCod(new COD());

        if (null !== $attributes) {
            if (isset($attributes->COD)) {
                $this->setCod(new COD($attributes->COD));
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
                $this->setHoldForPickup($attributes->HoldForPickup);
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
        $node->appendChild($this->getCod()->toNode($document));
        $node->appendChild($this->getInsuredValue()->toNode($document));
        $node->appendChild($document->createElement('EarliestDeliveryTime', $this->getEarliestDeliveryTime()));
        $node->appendChild($document->createElement('HazardousMaterialsCode', $this->getHazardousMaterialsCode()));
        $node->appendChild($document->createElement('HoldForPickup', $this->getHoldForPickup()));
        return $node;
    }

    /**
     * @param \Ups\Entity\COD $cod
     * @return $this
     */
    public function setCod($cod)
    {
        $this->cod = $cod;
        return $this;
    }

    /**
     * @return \Ups\Entity\COD
     */
    public function getCod()
    {
        return $this->cod;
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
     * @param string $holdForPickup
     * @return $this
     */
    public function setHoldForPickup($holdForPickup)
    {
        $this->holdForPickup = $holdForPickup;
        return $this;
    }

    /**
     * @return string
     */
    public function getHoldForPickup()
    {
        return $this->holdForPickup;
    }

    /**
     * @param \Ups\Entity\InsuredValue $insuredValue
     * @return $this
     */
    public function setInsuredValue($insuredValue)
    {
        $this->insuredValue = $insuredValue;
        return $this;
    }

    /**
     * @return \Ups\Entity\InsuredValue
     */
    public function getInsuredValue()
    {
        return $this->insuredValue;
    }

}
