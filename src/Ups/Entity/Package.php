<?php
namespace Ups\Entity;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class Package implements NodeInterface
{
    const PKG_OVERSIZE1 = '1';
    const PKG_OVERSIZE2 = '2';
    const PKG_LARGE = '4';

    /**
     * @var \Ups\Entity\PackagingType
     */
    private $packagingType;

    /**
     * @var \Ups\Entity\PackageWeight
     */
    private $packageWeight;

    /**
     * @var string
     */
    private $description;

    /**
     * @var \Ups\Entity\PackageServiceOptions
     */
    private $packageServiceOptions;

    /**
     * @var string
     */
    private $UpsPremiumCareIndicator;

    /**
     * @var \Ups\Entity\ReferenceNumber
     */
    private $referenceNumber;

    /**
     * @var string
     */
    private $trackingNumber;

    /**
     * @var string
     */
    private $largePackage;

    /**
     * @var \Ups\Entity\Dimensions
     */
    private $dimensions;

    /**
     * @var array
     */
    private $activity;

    function __construct($attributes = null)
    {
        $this->setReferenceNumber(new ReferenceNumber());
        $this->Dimensions(new Dimensions());
        $this->Activity(new Activity());

        if (null !== $attributes) {
            if (isset($attributes->PackageWeight)) {
                $this->setPackageWeight(new PackageWeight($attributes->PackageWeight));
            }
            if (isset($attributes->Description)) {
                $this->setDescription($attributes->Description);
            }
            if (isset($attributes->PackageServiceOptions)) {
                $this->setPackageServiceOptions(new PackageServiceOptions($attributes->PackageServiceOptions));
            }
            if (isset($attributes->UPSPremiumCareIndicator)) {
                $this->setUpsPremiumCareIndicator($attributes->UPSPremiumCareIndicator);
            }
            if (isset($attributes->ReferenceNumber)) {
                $this->setReferenceNumber(new ReferenceNumber($attributes->ReferenceNumber));
            }
            if (isset($attributes->TrackingNumber)) {
                $this->setTrackingNumber($attributes->TrackingNumber);
            }
            if (isset($attributes->LargePackage)) {
                $this->setLargePackage($attributes->LargePackage);
            }
            if (isset($attributes->Dimensions)) {
                $this->setDimensions(new Dimensions($attributes->Dimensions));
            }
            if (isset($attributes->Activity)) {
                $activity = $this->getActivity();
                if (is_array($attributes->Activity)) {
                    foreach ($attributes->Activity as $item) {
                        $activity[] = new Activity($item);
                    }
                } else {
                    $activity[] = new Activity($attributes->Activity);
                }
                $this->setActivity($activity);
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
        $node->appendChild($this->getPackagingType()->toNode($document));
        $node->appendChild($this->getPackageWeight()->toNode($document));
        $node->appendChild($document->createElement('Description', $this->getDescription()));
        $node->appendChild($this->getPackageServiceOptions()->toNode($document));
        $node->appendChild($document->createElement('UPSPremiumCareIndicator', $this->getUpsPremiumCareIndicator()));
        $node->appendChild($this->getReferenceNumber()->toNode($document));
        $node->appendChild($document->createElement('TrackingNumber', $this->getTrackingNumber()));
        $node->appendChild($document->createElement('LargePackage', $this->getLargePackage()));
        $node->appendChild($this->getDimensions()->toNode($document));
        if (count($this->getActivity()) > 0) {
            foreach ($this->getActivity() as $Activity) {
                $node->appendChild($Activity->toNode($document));
            }
        }
        return $node;
    }

    /**
     * @param string $UpsPremiumCareIndicator
     * @return $this
     */
    public function setUpsPremiumCareIndicator($UpsPremiumCareIndicator)
    {
        $this->UpsPremiumCareIndicator = $UpsPremiumCareIndicator;
        return $this;
    }

    /**
     * @return string
     */
    public function getUpsPremiumCareIndicator()
    {
        return $this->UpsPremiumCareIndicator;
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
     * @param \Ups\Entity\Dimensions $dimensions
     * @return $this
     */
    public function setDimensions($dimensions)
    {
        $this->dimensions = $dimensions;
        return $this;
    }

    /**
     * @return \Ups\Entity\Dimensions
     */
    public function getDimensions()
    {
        return $this->dimensions;
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
     * @param \Ups\Entity\PackageServiceOptions $packageServiceOptions
     * @return $this
     */
    public function setPackageServiceOptions($packageServiceOptions)
    {
        $this->packageServiceOptions = $packageServiceOptions;
        return $this;
    }

    /**
     * @return \Ups\Entity\PackageServiceOptions
     */
    public function getPackageServiceOptions()
    {
        return $this->packageServiceOptions;
    }

    /**
     * @param \Ups\Entity\PackageWeight $packageWeight
     * @return $this
     */
    public function setPackageWeight($packageWeight)
    {
        $this->packageWeight = $packageWeight;
        return $this;
    }

    /**
     * @return \Ups\Entity\PackageWeight
     */
    public function getPackageWeight()
    {
        return $this->packageWeight;
    }

    /**
     * @param \Ups\Entity\PackagingType $packagingType
     */
    public function setPackagingType($packagingType)
    {
        $this->packagingType = $packagingType;
        return $this;
    }

    /**
     * @return \Ups\Entity\PackagingType
     */
    public function getPackagingType()
    {
        return $this->packagingType;
    }

    /**
     * @param  \Ups\Entity\ReferenceNumber $referenceNumber
     * @return $this
     */
    public function setReferenceNumber($referenceNumber)
    {
        $this->referenceNumber = $referenceNumber;
        return $this;
    }

    /**
     * @return  \Ups\Entity\ReferenceNumber
     */
    public function getReferenceNumber()
    {
        return $this->referenceNumber;
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


}
