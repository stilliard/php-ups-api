<?php
namespace Ups\Entity\RateRequest;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  RestrictedArticles implements NodeInterface
{
    /**
     * @var string
     */
    private $alcoholicBeveragesIndicator;

    /**
     * @var string
     */
    private $diagnosticSpecimensIndicator;

    /**
     * @var string
     */
    private $perishablesIndicator;

    /**
     * @var string
     */
    private $plantsIndicator;

    /**
     * @var string
     */
    private $seedsIndicator;

    /**
     * @var string
     */
    private $specialExceptionsIndicator;

    /**
     * @var string
     */
    private $tobaccoIndicator;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->AlcoholicBeveragesIndicator)) {
                $this->setAlcoholicBeveragesIndicator($attributes->AlcoholicBeveragesIndicator);
            }
            if (isset($attributes->DiagnosticSpecimensIndicator)) {
                $this->setDiagnosticSpecimensIndicator($attributes->DiagnosticSpecimensIndicator);
            }
            if (isset($attributes->PerishablesIndicator)) {
                $this->setPerishablesIndicator($attributes->PerishablesIndicator);
            }
            if (isset($attributes->PlantsIndicator)) {
                $this->setPlantsIndicator($attributes->PlantsIndicator);
            }
            if (isset($attributes->SeedsIndicator)) {
                $this->setSeedsIndicator($attributes->SeedsIndicator);
            }
            if (isset($attributes->SpecialExceptionsIndicator)) {
                $this->setSpecialExceptionsIndicator($attributes->SpecialExceptionsIndicator);
            }
            if (isset($attributes->TobaccoIndicator)) {
                $this->setTobaccoIndicator($attributes->TobaccoIndicator);
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

        $node = $document->createElement('RestrictedArticles');
        if (null !== $this->getAlcoholicBeveragesIndicator()) {
            $node->appendChild($document->createElement('AlcoholicBeveragesIndicator', $this->getAlcoholicBeveragesIndicator()));
        }
        if (null !== $this->getDiagnosticSpecimensIndicator()) {
            $node->appendChild($document->createElement('DiagnosticSpecimensIndicator', $this->getDiagnosticSpecimensIndicator()));
        }
        if (null !== $this->getPerishablesIndicator()) {
            $node->appendChild($document->createElement('PerishablesIndicator', $this->getPerishablesIndicator()));
        }
        if (null !== $this->getPlantsIndicator()) {
            $node->appendChild($document->createElement('PlantsIndicator', $this->getPlantsIndicator()));
        }
        if (null !== $this->getSeedsIndicator()) {
            $node->appendChild($document->createElement('SeedsIndicator', $this->getSeedsIndicator()));
        }
        if (null !== $this->getSpecialExceptionsIndicator()) {
            $node->appendChild($document->createElement('SpecialExceptionsIndicator', $this->getSpecialExceptionsIndicator()));
        }
        if (null !== $this->getTobaccoIndicator()) {
            $node->appendChild($document->createElement('TobaccoIndicator', $this->getTobaccoIndicator()));
        }
        return $node;
    }

    /**
     * @param string $alcoholicBeveragesIndicator
     * @return $this
     */
    public function setAlcoholicBeveragesIndicator($alcoholicBeveragesIndicator)
    {
        $this->alcoholicBeveragesIndicator = $alcoholicBeveragesIndicator;
        return $this;
    }

    /**
     * @return string
     */
    public function getAlcoholicBeveragesIndicator()
    {
        return $this->alcoholicBeveragesIndicator;
    }

    /**
     * @param string $diagnosticSpecimensIndicator
     * @return $this
     */
    public function setDiagnosticSpecimensIndicator($diagnosticSpecimensIndicator)
    {
        $this->diagnosticSpecimensIndicator = $diagnosticSpecimensIndicator;
        return $this;
    }

    /**
     * @return string
     */
    public function getDiagnosticSpecimensIndicator()
    {
        return $this->diagnosticSpecimensIndicator;
    }

    /**
     * @param string $perishablesIndicator
     * @return $this
     */
    public function setPerishablesIndicator($perishablesIndicator)
    {
        $this->perishablesIndicator = $perishablesIndicator;
        return $this;
    }

    /**
     * @return string
     */
    public function getPerishablesIndicator()
    {
        return $this->perishablesIndicator;
    }

    /**
     * @param string $plantsIndicator
     * @return $this
     */
    public function setPlantsIndicator($plantsIndicator)
    {
        $this->plantsIndicator = $plantsIndicator;
        return $this;
    }

    /**
     * @return string
     */
    public function getPlantsIndicator()
    {
        return $this->plantsIndicator;
    }

    /**
     * @param string $seedsIndicator
     * @return $this
     */
    public function setSeedsIndicator($seedsIndicator)
    {
        $this->seedsIndicator = $seedsIndicator;
        return $this;
    }

    /**
     * @return string
     */
    public function getSeedsIndicator()
    {
        return $this->seedsIndicator;
    }

    /**
     * @param string $specialExceptionsIndicator
     * @return $this
     */
    public function setSpecialExceptionsIndicator($specialExceptionsIndicator)
    {
        $this->specialExceptionsIndicator = $specialExceptionsIndicator;
        return $this;
    }

    /**
     * @return string
     */
    public function getSpecialExceptionsIndicator()
    {
        return $this->specialExceptionsIndicator;
    }

    /**
     * @param string $tobaccoIndicator
     * @return $this
     */
    public function setTobaccoIndicator($tobaccoIndicator)
    {
        $this->tobaccoIndicator = $tobaccoIndicator;
        return $this;
    }

    /**
     * @return string
     */
    public function getTobaccoIndicator()
    {
        return $this->tobaccoIndicator;
    }

}
