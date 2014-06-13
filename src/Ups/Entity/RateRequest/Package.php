<?php
namespace Ups\Entity\RateRequest;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  Package implements NodeInterface
{
    /**
     * @var \Ups\Entity\RateRequest\PackagingType
     */
    private $packagingType;

    /**
     * @var \Ups\Entity\RateRequest\Dimensions
     */
    private $dimensions;

    /**
     * @var \Ups\Entity\RateRequest\PackageWeight
     */
    private $packageWeight;

    /**
     * @var string
     */
    private $largePackageIndicator;

    /**
     * @var \Ups\Entity\RateRequest\PackageServiceOptions
     */
    private $packageServiceOptions;

    /**
     * @var string
     */
    private $additionalHandling;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->PackagingType)) {
                $this->setPackagingType(new PackagingType($attributes->PackagingType));
            }
            if (isset($attributes->Dimensions)) {
                $this->setDimensions(new Dimensions($attributes->Dimensions));
            }
            if (isset($attributes->PackageWeight)) {
                $this->setPackageWeight(new PackageWeight($attributes->PackageWeight));
            }
            if (isset($attributes->LargePackageIndicator)) {
                $this->setLargePackageIndicator($attributes->LargePackageIndicator);
            }
            if (isset($attributes->PackageServiceOptions)) {
                $this->setPackageServiceOptions(new PackageServiceOptions($attributes->PackageServiceOptions));
            }
            if (isset($attributes->AdditionalHandling)) {
                $this->setAdditionalHandling($attributes->AdditionalHandling);
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

        $node = $document->createElement('Package');
        if (null !== $this->getPackagingType()) {
            $node->appendChild($this->getPackagingType()->toNode($document));
        }
        if (null !== $this->getDimensions()) {
            $node->appendChild($this->getDimensions()->toNode($document));
        }
        if (null !== $this->getPackageWeight()) {
            $node->appendChild($this->getPackageWeight()->toNode($document));
        }
        if (null !== $this->getLargePackageIndicator()) {
            $node->appendChild($document->createElement('LargePackageIndicator', $this->getLargePackageIndicator()));
        }
        if (null !== $this->getPackageServiceOptions()) {
            $node->appendChild($this->getPackageServiceOptions()->toNode($document));
        }
        if (null !== $this->getAdditionalHandling()) {
            $node->appendChild($document->createElement('AdditionalHandling', $this->getAdditionalHandling()));
        }
        return $node;
    }

    /**
     * @param \Ups\Entity\RateRequest\PackagingType $packagingType
     * @return $this
     */
    public function setPackagingType($packagingType)
    {
        $this->packagingType = $packagingType;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateRequest\PackagingType
     */
    public function getPackagingType()
    {
        return $this->packagingType;
    }

    /**
     * @param \Ups\Entity\RateRequest\Dimensions $dimensions
     * @return $this
     */
    public function setDimensions($dimensions)
    {
        $this->dimensions = $dimensions;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateRequest\Dimensions
     */
    public function getDimensions()
    {
        return $this->dimensions;
    }

    /**
     * @param \Ups\Entity\RateRequest\PackageWeight $packageWeight
     * @return $this
     */
    public function setPackageWeight($packageWeight)
    {
        $this->packageWeight = $packageWeight;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateRequest\PackageWeight
     */
    public function getPackageWeight()
    {
        return $this->packageWeight;
    }

    /**
     * @param string $largePackageIndicator
     * @return $this
     */
    public function setLargePackageIndicator($largePackageIndicator)
    {
        $this->largePackageIndicator = $largePackageIndicator;
        return $this;
    }

    /**
     * @return string
     */
    public function getLargePackageIndicator()
    {
        return $this->largePackageIndicator;
    }

    /**
     * @param \Ups\Entity\RateRequest\PackageServiceOptions $packageServiceOptions
     * @return $this
     */
    public function setPackageServiceOptions($packageServiceOptions)
    {
        $this->packageServiceOptions = $packageServiceOptions;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateRequest\PackageServiceOptions
     */
    public function getPackageServiceOptions()
    {
        return $this->packageServiceOptions;
    }

    /**
     * @param string $additionalHandling
     * @return $this
     */
    public function setAdditionalHandling($additionalHandling)
    {
        $this->additionalHandling = $additionalHandling;
        return $this;
    }

    /**
     * @return string
     */
    public function getAdditionalHandling()
    {
        return $this->additionalHandling;
    }

}
