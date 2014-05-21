<?php
namespace Ups\Entity\QuantumViewResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  UpdatedAddress implements NodeInterface
{
    /**
     * @var string
     */
    private $consigneeName;

    /**
     * @var string
     */
    private $streetNumberLow;

    /**
     * @var string
     */
    private $streetPrefix;

    /**
     * @var string
     */
    private $streetName;

    /**
     * @var string
     */
    private $street;

    /**
     * @var string
     */
    private $streetSuffix;

    /**
     * @var array
     */
    private $addressExtendedInformation;

    /**
     * @var string
     */
    private $politicalDivision3;

    /**
     * @var string
     */
    private $politicalDivision2;

    /**
     * @var string
     */
    private $politicalDivision1;

    /**
     * @var string
     */
    private $countryCode;

    /**
     * @var string
     */
    private $postcodePrimaryLow;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->ConsigneeName)) {
                $this->setConsigneeName($attributes->ConsigneeName);
            }
            if (isset($attributes->StreetNumberLow)) {
                $this->setStreetNumberLow($attributes->StreetNumberLow);
            }
            if (isset($attributes->StreetPrefix)) {
                $this->setStreetPrefix($attributes->StreetPrefix);
            }
            if (isset($attributes->StreetName)) {
                $this->setStreetName($attributes->StreetName);
            }
            if (isset($attributes->Street)) {
                $this->setStreet($attributes->Street);
            }
            if (isset($attributes->StreetSuffix)) {
                $this->setStreetSuffix($attributes->StreetSuffix);
            }
            if (isset($attributes->AddressExtendedInformation)) {
                $addressExtendedInformation = $this->getAddressExtendedInformation();
                foreach ($attributes->AddressExtendedInformation as $item) {
                    $addressExtendedInformation[] = new AddressExtendedInformation($item);
                }
                $this->setAddressExtendedInformation($addressExtendedInformation);
            }
            if (isset($attributes->PoliticalDivision3)) {
                $this->setPoliticalDivision3($attributes->PoliticalDivision3);
            }
            if (isset($attributes->PoliticalDivision2)) {
                $this->setPoliticalDivision2($attributes->PoliticalDivision2);
            }
            if (isset($attributes->PoliticalDivision1)) {
                $this->setPoliticalDivision1($attributes->PoliticalDivision1);
            }
            if (isset($attributes->CountryCode)) {
                $this->setCountryCode($attributes->CountryCode);
            }
            if (isset($attributes->PostcodePrimaryLow)) {
                $this->setPostcodePrimaryLow($attributes->PostcodePrimaryLow);
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

        $node = $document->createElement('UpdatedAddress');
        if (null !== $this->getConsigneeName()) {
            $node->appendChild($document->createElement('ConsigneeName', $this->getConsigneeName()));
        }
        if (null !== $this->getStreetNumberLow()) {
            $node->appendChild($document->createElement('StreetNumberLow', $this->getStreetNumberLow()));
        }
        if (null !== $this->getStreetPrefix()) {
            $node->appendChild($document->createElement('StreetPrefix', $this->getStreetPrefix()));
        }
        if (null !== $this->getStreetName()) {
            $node->appendChild($document->createElement('StreetName', $this->getStreetName()));
        }
        if (null !== $this->getStreet()) {
            $node->appendChild($document->createElement('Street', $this->getStreet()));
        }
        if (null !== $this->getStreetSuffix()) {
            $node->appendChild($document->createElement('StreetSuffix', $this->getStreetSuffix()));
        }
        if (null !== $this->getAddressExtendedInformation()) {
            if (count($this->getAddressExtendedInformation()) > 0) {
                foreach ($this->getAddressExtendedInformation() as $AddressExtendedInformation) {
                    $node->appendChild($AddressExtendedInformation->toNode($document));
                }
            }
        }
        if (null !== $this->getPoliticalDivision3()) {
            $node->appendChild($document->createElement('PoliticalDivision3', $this->getPoliticalDivision3()));
        }
        if (null !== $this->getPoliticalDivision2()) {
            $node->appendChild($document->createElement('PoliticalDivision2', $this->getPoliticalDivision2()));
        }
        if (null !== $this->getPoliticalDivision1()) {
            $node->appendChild($document->createElement('PoliticalDivision1', $this->getPoliticalDivision1()));
        }
        if (null !== $this->getCountryCode()) {
            $node->appendChild($document->createElement('CountryCode', $this->getCountryCode()));
        }
        if (null !== $this->getPostcodePrimaryLow()) {
            $node->appendChild($document->createElement('PostcodePrimaryLow', $this->getPostcodePrimaryLow()));
        }
        return $node;
    }

    /**
     * @param string $consigneeName
     * @return $this
     */
    public function setConsigneeName($consigneeName)
    {
        $this->consigneeName = $consigneeName;
        return $this;
    }

    /**
     * @return string
     */
    public function getConsigneeName()
    {
        return $this->consigneeName;
    }

    /**
     * @param string $streetNumberLow
     * @return $this
     */
    public function setStreetNumberLow($streetNumberLow)
    {
        $this->streetNumberLow = $streetNumberLow;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreetNumberLow()
    {
        return $this->streetNumberLow;
    }

    /**
     * @param string $streetPrefix
     * @return $this
     */
    public function setStreetPrefix($streetPrefix)
    {
        $this->streetPrefix = $streetPrefix;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreetPrefix()
    {
        return $this->streetPrefix;
    }

    /**
     * @param string $streetName
     * @return $this
     */
    public function setStreetName($streetName)
    {
        $this->streetName = $streetName;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreetName()
    {
        return $this->streetName;
    }

    /**
     * @param string $street
     * @return $this
     */
    public function setStreet($street)
    {
        $this->street = $street;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param string $streetSuffix
     * @return $this
     */
    public function setStreetSuffix($streetSuffix)
    {
        $this->streetSuffix = $streetSuffix;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreetSuffix()
    {
        return $this->streetSuffix;
    }

    /**
     * @param array $addressExtendedInformation
     * @return $this
     */
    public function setAddressExtendedInformation($addressExtendedInformation)
    {
        $this->addressExtendedInformation = $addressExtendedInformation;
        return $this;
    }

    /**
     * @return array
     */
    public function getAddressExtendedInformation()
    {
        return $this->addressExtendedInformation;
    }

    /**
     * @param string $politicalDivision3
     * @return $this
     */
    public function setPoliticalDivision3($politicalDivision3)
    {
        $this->politicalDivision3 = $politicalDivision3;
        return $this;
    }

    /**
     * @return string
     */
    public function getPoliticalDivision3()
    {
        return $this->politicalDivision3;
    }

    /**
     * @param string $politicalDivision2
     * @return $this
     */
    public function setPoliticalDivision2($politicalDivision2)
    {
        $this->politicalDivision2 = $politicalDivision2;
        return $this;
    }

    /**
     * @return string
     */
    public function getPoliticalDivision2()
    {
        return $this->politicalDivision2;
    }

    /**
     * @param string $politicalDivision1
     * @return $this
     */
    public function setPoliticalDivision1($politicalDivision1)
    {
        $this->politicalDivision1 = $politicalDivision1;
        return $this;
    }

    /**
     * @return string
     */
    public function getPoliticalDivision1()
    {
        return $this->politicalDivision1;
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
     * @param string $postcodePrimaryLow
     * @return $this
     */
    public function setPostcodePrimaryLow($postcodePrimaryLow)
    {
        $this->postcodePrimaryLow = $postcodePrimaryLow;
        return $this;
    }

    /**
     * @return string
     */
    public function getPostcodePrimaryLow()
    {
        return $this->postcodePrimaryLow;
    }

}
