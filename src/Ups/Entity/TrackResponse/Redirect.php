<?php
namespace Ups\Entity\TrackResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  Redirect implements NodeInterface
{
    /**
     * @var string
     */
    private $companyName;

    /**
     * @var string
     */
    private $locationID;

    /**
     * @var string
     */
    private $pickupDate;

    /**
     * @var \Ups\Entity\TrackResponse\UPSAPAddress
     */
    private $uPSAPAddress;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->CompanyName)) {
                $this->setCompanyName($attributes->CompanyName);
            }
            if (isset($attributes->LocationID)) {
                $this->setLocationID($attributes->LocationID);
            }
            if (isset($attributes->PickupDate)) {
                $this->setPickupDate($attributes->PickupDate);
            }
            if (isset($attributes->UPSAPAddress)) {
                $this->setUPSAPAddress(new UPSAPAddress($attributes->UPSAPAddress));
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

        $node = $document->createElement('Redirect');
        if (null !== $this->getCompanyName()) {
            $node->appendChild($document->createElement('CompanyName', $this->getCompanyName()));
        }
        if (null !== $this->getLocationID()) {
            $node->appendChild($document->createElement('LocationID', $this->getLocationID()));
        }
        if (null !== $this->getPickupDate()) {
            $node->appendChild($document->createElement('PickupDate', $this->getPickupDate()));
        }
        if (null !== $this->getUPSAPAddress()) {
            $node->appendChild($this->getUPSAPAddress()->toNode($document));
        }
        return $node;
    }

    /**
     * @param string $companyName
     * @return $this
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;
        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * @param string $locationID
     * @return $this
     */
    public function setLocationID($locationID)
    {
        $this->locationID = $locationID;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocationID()
    {
        return $this->locationID;
    }

    /**
     * @param string $pickupDate
     * @return $this
     */
    public function setPickupDate($pickupDate)
    {
        $this->pickupDate = $pickupDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getPickupDate()
    {
        return $this->pickupDate;
    }

    /**
     * @param \Ups\Entity\TrackResponse\UPSAPAddress $uPSAPAddress
     * @return $this
     */
    public function setUPSAPAddress($uPSAPAddress)
    {
        $this->uPSAPAddress = $uPSAPAddress;
        return $this;
    }

    /**
     * @return \Ups\Entity\TrackResponse\UPSAPAddress
     */
    public function getUPSAPAddress()
    {
        return $this->uPSAPAddress;
    }

}
