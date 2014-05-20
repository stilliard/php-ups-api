<?php
namespace Ups\Entity\RateRequest;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  DryIce implements NodeInterface
{
    /**
     * @var string
     */
    private $regulationSet;

    /**
     * @var \Ups\Entity\RateRequest\DryIceWeight
     */
    private $dryIceWeight;

    /**
     * @var string
     */
    private $medicalUseIndicator;

    /**
     * @var string
     */
    private $auditRequired;

    function __construct($attributes = null)
    {
        $this->setDryIceWeight(new DryIceWeight());

        if (null !== $attributes) {
            if (isset($attributes->RegulationSet)) {
                $this->setRegulationSet($attributes->RegulationSet);
            }
            if (isset($attributes->DryIceWeight)) {
                $this->setDryIceWeight(new DryIceWeight($attributes->DryIceWeight));
            }
            if (isset($attributes->MedicalUseIndicator)) {
                $this->setMedicalUseIndicator($attributes->MedicalUseIndicator);
            }
            if (isset($attributes->AuditRequired)) {
                $this->setAuditRequired($attributes->AuditRequired);
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

        $node = $document->createElement('DryIce');
        $node->appendChild($document->createElement('RegulationSet', $this->getRegulationSet()));
        $node->appendChild($this->getDryIceWeight()->toNode($document));
        if (null !== $this->getMedicalUseIndicator()) {
            $node->appendChild($document->createElement('MedicalUseIndicator', $this->getMedicalUseIndicator()));
        }
        if (null !== $this->getAuditRequired()) {
            $node->appendChild($document->createElement('AuditRequired', $this->getAuditRequired()));
        }
        return $node;
    }

    /**
     * @param string $regulationSet
     * @return $this
     */
    public function setRegulationSet($regulationSet)
    {
        $this->regulationSet = $regulationSet;
        return $this;
    }

    /**
     * @return string
     */
    public function getRegulationSet()
    {
        return $this->regulationSet;
    }

    /**
     * @param \Ups\Entity\RateRequest\DryIceWeight $dryIceWeight
     * @return $this
     */
    public function setDryIceWeight($dryIceWeight)
    {
        $this->dryIceWeight = $dryIceWeight;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateRequest\DryIceWeight
     */
    public function getDryIceWeight()
    {
        return $this->dryIceWeight;
    }

    /**
     * @param string $medicalUseIndicator
     * @return $this
     */
    public function setMedicalUseIndicator($medicalUseIndicator)
    {
        $this->medicalUseIndicator = $medicalUseIndicator;
        return $this;
    }

    /**
     * @return string
     */
    public function getMedicalUseIndicator()
    {
        return $this->medicalUseIndicator;
    }

    /**
     * @param string $auditRequired
     * @return $this
     */
    public function setAuditRequired($auditRequired)
    {
        $this->auditRequired = $auditRequired;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuditRequired()
    {
        return $this->auditRequired;
    }

}
