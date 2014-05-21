<?php
namespace Ups\Entity\QuantumViewResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  Package implements NodeInterface
{
    /**
     * @var array
     */
    private $activity;

    /**
     * @var string
     */
    private $description;

    /**
     * @var \Ups\Entity\QuantumViewResponse\Dimensions
     */
    private $dimensions;

    /**
     * @var \Ups\Entity\QuantumViewResponse\DimensionalWeight
     */
    private $dimensionalWeight;

    /**
     * @var \Ups\Entity\QuantumViewResponse\PackageWeight
     */
    private $packageWeight;

    /**
     * @var string
     */
    private $largePackage;

    /**
     * @var string
     */
    private $trackingNumber;

    /**
     * @var \Ups\Entity\QuantumViewResponse\ReferenceNumber
     */
    private $referenceNumber;

    /**
     * @var \Ups\Entity\QuantumViewResponse\PackageServiceOptions
     */
    private $packageServiceOptions;

    /**
     * @var string
     */
    private $uPSPremiumCareIndicator;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->Activity)) {
                $activity = $this->getActivity();
                foreach ($attributes->Activity as $item) {
                    $activity[] = new Activity($item);
                }
                $this->setActivity($activity);
            }
            if (isset($attributes->Description)) {
                $this->setDescription($attributes->Description);
            }
            if (isset($attributes->Dimensions)) {
                $this->setDimensions(new Dimensions($attributes->Dimensions));
            }
            if (isset($attributes->DimensionalWeight)) {
                $this->setDimensionalWeight(new DimensionalWeight($attributes->DimensionalWeight));
            }
            if (isset($attributes->PackageWeight)) {
                $this->setPackageWeight(new PackageWeight($attributes->PackageWeight));
            }
            if (isset($attributes->LargePackage)) {
                $this->setLargePackage($attributes->LargePackage);
            }
            if (isset($attributes->TrackingNumber)) {
                $this->setTrackingNumber($attributes->TrackingNumber);
            }
            if (isset($attributes->ReferenceNumber)) {
                $this->setReferenceNumber(new ReferenceNumber($attributes->ReferenceNumber));
            }
            if (isset($attributes->PackageServiceOptions)) {
                $this->setPackageServiceOptions(new PackageServiceOptions($attributes->PackageServiceOptions));
            }
            if (isset($attributes->UPSPremiumCareIndicator)) {
                $this->setUPSPremiumCareIndicator($attributes->UPSPremiumCareIndicator);
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
        if (null !== $this->getActivity()) {
            if (count($this->getActivity()) > 0) {
                foreach ($this->getActivity() as $Activity) {
                    $node->appendChild($Activity->toNode($document));
                }
            }
        }
        if (null !== $this->getDescription()) {
            $node->appendChild($document->createElement('Description', $this->getDescription()));
        }
        if (null !== $this->getDimensions()) {
            $node->appendChild($this->getDimensions()->toNode($document));
        }
        if (null !== $this->getDimensionalWeight()) {
            $node->appendChild($this->getDimensionalWeight()->toNode($document));
        }
        if (null !== $this->getPackageWeight()) {
            $node->appendChild($this->getPackageWeight()->toNode($document));
        }
        if (null !== $this->getLargePackage()) {
            $node->appendChild($document->createElement('LargePackage', $this->getLargePackage()));
        }
        if (null !== $this->getTrackingNumber()) {
            $node->appendChild($document->createElement('TrackingNumber', $this->getTrackingNumber()));
        }
        if (null !== $this->getReferenceNumber()) {
            $node->appendChild($this->getReferenceNumber()->toNode($document));
        }
        if (null !== $this->getPackageServiceOptions()) {
            $node->appendChild($this->getPackageServiceOptions()->toNode($document));
        }
        if (null !== $this->getUPSPremiumCareIndicator()) {
            $node->appendChild($document->createElement('UPSPremiumCareIndicator', $this->getUPSPremiumCareIndicator()));
        }
        return $node;
    }

    /**
     * @param array $activity
     * @return $this
     */
    public function setActivity($activity)
    {
        $this->activity = $activity;
        return $this;
    }

    /**
     * @return array
     */
    public function getActivity()
    {
        return $this->activity;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param \Ups\Entity\QuantumViewResponse\Dimensions $dimensions
     * @return $this
     */
    public function setDimensions($dimensions)
    {
        $this->dimensions = $dimensions;
        return $this;
    }

    /**
     * @return \Ups\Entity\QuantumViewResponse\Dimensions
     */
    public function getDimensions()
    {
        return $this->dimensions;
    }

    /**
     * @param \Ups\Entity\QuantumViewResponse\DimensionalWeight $dimensionalWeight
     * @return $this
     */
    public function setDimensionalWeight($dimensionalWeight)
    {
        $this->dimensionalWeight = $dimensionalWeight;
        return $this;
    }

    /**
     * @return \Ups\Entity\QuantumViewResponse\DimensionalWeight
     */
    public function getDimensionalWeight()
    {
        return $this->dimensionalWeight;
    }

    /**
     * @param \Ups\Entity\QuantumViewResponse\PackageWeight $packageWeight
     * @return $this
     */
    public function setPackageWeight($packageWeight)
    {
        $this->packageWeight = $packageWeight;
        return $this;
    }

    /**
     * @return \Ups\Entity\QuantumViewResponse\PackageWeight
     */
    public function getPackageWeight()
    {
        return $this->packageWeight;
    }

    /**
     * @param string $largePackage
     * @return $this
     */
    public function setLargePackage($largePackage)
    {
        $this->largePackage = $largePackage;
        return $this;
    }

    /**
     * @return string
     */
    public function getLargePackage()
    {
        return $this->largePackage;
    }

    /**
     * @param string $trackingNumber
     * @return $this
     */
    public function setTrackingNumber($trackingNumber)
    {
        $this->trackingNumber = $trackingNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getTrackingNumber()
    {
        return $this->trackingNumber;
    }

    /**
     * @param \Ups\Entity\QuantumViewResponse\ReferenceNumber $referenceNumber
     * @return $this
     */
    public function setReferenceNumber($referenceNumber)
    {
        $this->referenceNumber = $referenceNumber;
        return $this;
    }

    /**
     * @return \Ups\Entity\QuantumViewResponse\ReferenceNumber
     */
    public function getReferenceNumber()
    {
        return $this->referenceNumber;
    }

    /**
     * @param \Ups\Entity\QuantumViewResponse\PackageServiceOptions $packageServiceOptions
     * @return $this
     */
    public function setPackageServiceOptions($packageServiceOptions)
    {
        $this->packageServiceOptions = $packageServiceOptions;
        return $this;
    }

    /**
     * @return \Ups\Entity\QuantumViewResponse\PackageServiceOptions
     */
    public function getPackageServiceOptions()
    {
        return $this->packageServiceOptions;
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

}
