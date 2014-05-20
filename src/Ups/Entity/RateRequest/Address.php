<?php
namespace Ups\Entity\RateRequest;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  Address implements NodeInterface
{
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
    private $residentialAddressIndicator;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
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
            if (isset($attributes->ResidentialAddressIndicator)) {
                $this->setResidentialAddressIndicator($attributes->ResidentialAddressIndicator);
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

        $node = $document->createElement('Address');
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
        $node->appendChild($document->createElement('CountryCode', $this->getCountryCode()));
        if (null !== $this->getResidentialAddressIndicator()) {
            $node->appendChild($document->createElement('ResidentialAddressIndicator', $this->getResidentialAddressIndicator()));
        }
        return $node;
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
     * @param string $residentialAddressIndicator
     * @return $this
     */
    public function setResidentialAddressIndicator($residentialAddressIndicator)
    {
        $this->residentialAddressIndicator = $residentialAddressIndicator;
        return $this;
    }

    /**
     * @return string
     */
    public function getResidentialAddressIndicator()
    {
        return $this->residentialAddressIndicator;
    }

}
