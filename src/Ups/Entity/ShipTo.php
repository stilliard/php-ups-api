<?php
namespace Ups\Entity;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class ShipTo implements NodeInterface
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $receivingAddressName;

    /**
     * @var string
     */
    private $companyName;

    /**
     * @var string
     */
    private $attentionName;

    /**
     * @var string
     */
    private $taxIdentificationNumber;

    /**
     * @var string
     */
    private $phoneNumber;

    /**
     * @var string
     */
    private $faxNumber;

    /**
     * @var string
     */
    private $eMailAddress;

    /**
     * @var \Ups\Entity\Address
     */
    private $address;

    /**
     * @var string
     */
    private $shipperAssignedIdentificationNumber;

    /**
     * @var string
     */
    private $locationID;

    /**
     * @var string
     */
    private $bookmark;


    function __construct($attributes = null)
    {
        $this->setAddress(new Address());

        if (null !== $attributes) {
            if (isset($attributes->Name)) {
                $this->setName($attributes->Name);
            }
            if (isset($attributes->ReceivingAddressName)) {
                $this->setReceivingAddressName($attributes->ReceivingAddressName);
            }
            if (isset($attributes->CompanyName)) {
                $this->setCompanyName($attributes->CompanyName);
            }
            if (isset($attributes->AttentionName)) {
                $this->setAttentionName($attributes->AttentionName);
            }
            if (isset($attributes->TaxIdentificationNumber)) {
                $this->setTaxIdentificationNumber($attributes->TaxIdentificationNumber);
            }
            if (isset($attributes->PhoneNumber)) {
                $this->setPhoneNumber($attributes->PhoneNumber);
            }
            if (isset($attributes->FaxNumber)) {
                $this->setFaxNumber($attributes->FaxNumber);
            }
            if (isset($attributes->EMailAddress)) {
                $this->setEMailAddress($attributes->EMailAddress);
            }
            if (isset($attributes->Address)) {
                $this->setAddress(new Address($attributes->Address));
            }
            if (isset($attributes->ShipperAssignedIdentificationNumber)) {
                $this->setShipperAssignedIdentificationNumber($attributes->ShipperAssignedIdentificationNumber);
            }
            if (isset($attributes->LocationID)) {
                $this->setLocationID($attributes->LocationID);
            }
            if (isset($attributes->Bookmark)) {
                $this->setBookmark($attributes->Bookmark);
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

        $node = $document->createElement('ShipTo');
        $node->appendChild($document->createElement('Name', $this->getName()));
        $node->appendChild($document->createElement('ReceivingAddressName', $this->getReceivingAddressName()));
        $node->appendChild($document->createElement('CompanyName', $this->getCompanyName()));
        $node->appendChild($document->createElement('AttentionName', $this->getAttentionName()));
        $node->appendChild($document->createElement('TaxIdentificationNumber', $this->getTaxIdentificationNumber()));
        $node->appendChild($document->createElement('PhoneNumber', $this->getPhoneNumber()));
        $node->appendChild($document->createElement('FaxNumber', $this->getFaxNumber()));
        $node->appendChild($document->createElement('EMailAddress', $this->getEMailAddress()));
        $node->appendChild($this->getAddress()->toNode($document));
        $node->appendChild($document->createElement('ShipperAssignedIdentificationNumber', $this->getShipperAssignedIdentificationNumber()));
        $node->appendChild($document->createElement('LocationID', $this->getLocationID()));
        $node->appendChild($document->createElement('Bookmark', $this->getBookmark()));
        return $node;
    }

    /**
     * @param \Ups\Entity\Address $address
     * @return $this
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return \Ups\Entity\Address
     */
    public function getAddress()
    {
        return $this->address;
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
     * @param string $attentionName
     * @return $this
     */
    public function setAttentionName($attentionName)
    {
        $this->attentionName = $attentionName;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttentionName()
    {
        return $this->attentionName;
    }

    /**
     * @param string $eMailAddress
     * @return $this
     */
    public function setEMailAddress($eMailAddress)
    {
        $this->eMailAddress = $eMailAddress;
        return $this;
    }

    /**
     * @return string
     */
    public function getEMailAddress()
    {
        return $this->eMailAddress;
    }

    /**
     * @param string $faxNumber
     * @return $this
     */
    public function setFaxNumber($faxNumber)
    {
        $this->faxNumber = $faxNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getFaxNumber()
    {
        return $this->faxNumber;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $receivingAddressName
     * @return $this
     */
    public function setReceivingAddressName($receivingAddressName)
    {
        $this->receivingAddressName = $receivingAddressName;
        return $this;
    }

    /**
     * @return string
     */
    public function getReceivingAddressName()
    {
        return $this->receivingAddressName;
    }

    /**
     * @param string $phoneNumber
     * @return $this
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $taxIdentificationNumber
     * @return $this
     */
    public function setTaxIdentificationNumber($taxIdentificationNumber)
    {
        $this->taxIdentificationNumber = $taxIdentificationNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getTaxIdentificationNumber()
    {
        return $this->taxIdentificationNumber;
    }

    /**
     * @param string $shipperAssignedIdentificationNumber
     * @return $this
     */
    public function setShipperAssignedIdentificationNumber($shipperAssignedIdentificationNumber)
    {
        $this->shipperAssignedIdentificationNumber = $shipperAssignedIdentificationNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getShipperAssignedIdentificationNumber()
    {
        return $this->shipperAssignedIdentificationNumber;
    }

    /**
     * @param string $bookmark
     * @return $this
     */
    public function setBookmark($bookmark)
    {
        $this->bookmark = $bookmark;
        return $this;
    }

    /**
     * @return string
     */
    public function getBookmark()
    {
        return $this->bookmark;
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

}
