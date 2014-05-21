<?php
namespace Ups\Entity\QuantumViewResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  UAPAddress implements NodeInterface
{
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
    private $addressLine1;

    /**
     * @var string
     */
    private $addressLine2;

    /**
     * @var string
     */
    private $addressLine3;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $stateProvinceCode;

    /**
     * @var string
     */
    private $postalCode;

    /**
     * @var string
     */
    private $countryCode;

    /**
     * @var string
     */
    private $phoneNumber;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->CompanyName)) {
                $this->setCompanyName($attributes->CompanyName);
            }
            if (isset($attributes->AttentionName)) {
                $this->setAttentionName($attributes->AttentionName);
            }
            if (isset($attributes->AddressLine1)) {
                $this->setAddressLine1($attributes->AddressLine1);
            }
            if (isset($attributes->AddressLine2)) {
                $this->setAddressLine2($attributes->AddressLine2);
            }
            if (isset($attributes->AddressLine3)) {
                $this->setAddressLine3($attributes->AddressLine3);
            }
            if (isset($attributes->City)) {
                $this->setCity($attributes->City);
            }
            if (isset($attributes->StateProvinceCode)) {
                $this->setStateProvinceCode($attributes->StateProvinceCode);
            }
            if (isset($attributes->PostalCode)) {
                $this->setPostalCode($attributes->PostalCode);
            }
            if (isset($attributes->CountryCode)) {
                $this->setCountryCode($attributes->CountryCode);
            }
            if (isset($attributes->PhoneNumber)) {
                $this->setPhoneNumber($attributes->PhoneNumber);
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

        $node = $document->createElement('UAPAddress');
        if (null !== $this->getCompanyName()) {
            $node->appendChild($document->createElement('CompanyName', $this->getCompanyName()));
        }
        if (null !== $this->getAttentionName()) {
            $node->appendChild($document->createElement('AttentionName', $this->getAttentionName()));
        }
        if (null !== $this->getAddressLine1()) {
            $node->appendChild($document->createElement('AddressLine1', $this->getAddressLine1()));
        }
        if (null !== $this->getAddressLine2()) {
            $node->appendChild($document->createElement('AddressLine2', $this->getAddressLine2()));
        }
        if (null !== $this->getAddressLine3()) {
            $node->appendChild($document->createElement('AddressLine3', $this->getAddressLine3()));
        }
        if (null !== $this->getCity()) {
            $node->appendChild($document->createElement('City', $this->getCity()));
        }
        if (null !== $this->getStateProvinceCode()) {
            $node->appendChild($document->createElement('StateProvinceCode', $this->getStateProvinceCode()));
        }
        if (null !== $this->getPostalCode()) {
            $node->appendChild($document->createElement('PostalCode', $this->getPostalCode()));
        }
        if (null !== $this->getCountryCode()) {
            $node->appendChild($document->createElement('CountryCode', $this->getCountryCode()));
        }
        if (null !== $this->getPhoneNumber()) {
            $node->appendChild($document->createElement('PhoneNumber', $this->getPhoneNumber()));
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
     * @param string $addressLine1
     * @return $this
     */
    public function setAddressLine1($addressLine1)
    {
        $this->addressLine1 = $addressLine1;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddressLine1()
    {
        return $this->addressLine1;
    }

    /**
     * @param string $addressLine2
     * @return $this
     */
    public function setAddressLine2($addressLine2)
    {
        $this->addressLine2 = $addressLine2;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddressLine2()
    {
        return $this->addressLine2;
    }

    /**
     * @param string $addressLine3
     * @return $this
     */
    public function setAddressLine3($addressLine3)
    {
        $this->addressLine3 = $addressLine3;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddressLine3()
    {
        return $this->addressLine3;
    }

    /**
     * @param string $city
     * @return $this
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $stateProvinceCode
     * @return $this
     */
    public function setStateProvinceCode($stateProvinceCode)
    {
        $this->stateProvinceCode = $stateProvinceCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getStateProvinceCode()
    {
        return $this->stateProvinceCode;
    }

    /**
     * @param string $postalCode
     * @return $this
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param string $countryCode
     * @return $this
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
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

}
