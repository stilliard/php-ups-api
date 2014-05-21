<?php
namespace Ups\Entity\QuantumViewResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  Shipper implements NodeInterface
{
    /**
     * @var string
     */
    private $name;

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
    private $shipperNumber;

    /**
     * @var string
     */
    private $eMailAddress;

    /**
     * @var \Ups\Entity\QuantumViewResponse\Address
     */
    private $address;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->Name)) {
                $this->setName($attributes->Name);
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
            if (isset($attributes->ShipperNumber)) {
                $this->setShipperNumber($attributes->ShipperNumber);
            }
            if (isset($attributes->EMailAddress)) {
                $this->setEMailAddress($attributes->EMailAddress);
            }
            if (isset($attributes->Address)) {
                $this->setAddress(new Address($attributes->Address));
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

        $node = $document->createElement('Shipper');
        $node->appendChild($document->createElement('Name', $this->getName()));
        if (null !== $this->getAttentionName()) {
            $node->appendChild($document->createElement('AttentionName', $this->getAttentionName()));
        }
        if (null !== $this->getTaxIdentificationNumber()) {
            $node->appendChild($document->createElement('TaxIdentificationNumber', $this->getTaxIdentificationNumber()));
        }
        if (null !== $this->getPhoneNumber()) {
            $node->appendChild($document->createElement('PhoneNumber', $this->getPhoneNumber()));
        }
        if (null !== $this->getFaxNumber()) {
            $node->appendChild($document->createElement('FaxNumber', $this->getFaxNumber()));
        }
        if (null !== $this->getShipperNumber()) {
            $node->appendChild($document->createElement('ShipperNumber', $this->getShipperNumber()));
        }
        if (null !== $this->getEMailAddress()) {
            $node->appendChild($document->createElement('EMailAddress', $this->getEMailAddress()));
        }
        if (null !== $this->getAddress()) {
            $node->appendChild($this->getAddress()->toNode($document));
        }
        return $node;
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
     * @param string $shipperNumber
     * @return $this
     */
    public function setShipperNumber($shipperNumber)
    {
        $this->shipperNumber = $shipperNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getShipperNumber()
    {
        return $this->shipperNumber;
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
     * @param \Ups\Entity\QuantumViewResponse\Address $address
     * @return $this
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return \Ups\Entity\QuantumViewResponse\Address
     */
    public function getAddress()
    {
        return $this->address;
    }

}
