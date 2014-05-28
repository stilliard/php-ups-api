<?php
namespace Ups\Entity\TimeInTransitRequest;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  AddressArtifactFormat implements NodeInterface
{
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
    private $country;

    /**
     * @var string
     */
    private $countryCode;

    /**
     * @var string
     */
    private $postcodePrimaryHigh;

    /**
     * @var string
     */
    private $postcodePrimaryLow;

    /**
     * @var \Ups\Entity\TimeInTransitRequest\ResidentialAddressIndicator
     */
    private $residentialAddressIndicator;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->PoliticalDivision3)) {
                $this->setPoliticalDivision3($attributes->PoliticalDivision3);
            }
            if (isset($attributes->PoliticalDivision2)) {
                $this->setPoliticalDivision2($attributes->PoliticalDivision2);
            }
            if (isset($attributes->PoliticalDivision1)) {
                $this->setPoliticalDivision1($attributes->PoliticalDivision1);
            }
            if (isset($attributes->Country)) {
                $this->setCountry($attributes->Country);
            }
            if (isset($attributes->CountryCode)) {
                $this->setCountryCode($attributes->CountryCode);
            }
            if (isset($attributes->PostcodePrimaryHigh)) {
                $this->setPostcodePrimaryHigh($attributes->PostcodePrimaryHigh);
            }
            if (isset($attributes->PostcodePrimaryLow)) {
                $this->setPostcodePrimaryLow($attributes->PostcodePrimaryLow);
            }
            if (isset($attributes->ResidentialAddressIndicator)) {
                $this->setResidentialAddressIndicator(new ResidentialAddressIndicator($attributes->ResidentialAddressIndicator));
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

        $node = $document->createElement('AddressArtifactFormat');
        if (null !== $this->getPoliticalDivision3()) {
            $node->appendChild($document->createElement('PoliticalDivision3', $this->getPoliticalDivision3()));
        }
        if (null !== $this->getPoliticalDivision2()) {
            $node->appendChild($document->createElement('PoliticalDivision2', $this->getPoliticalDivision2()));
        }
        if (null !== $this->getPoliticalDivision1()) {
            $node->appendChild($document->createElement('PoliticalDivision1', $this->getPoliticalDivision1()));
        }
        if (null !== $this->getCountry()) {
            $node->appendChild($document->createElement('Country', $this->getCountry()));
        }
        if (null !== $this->getCountryCode()) {
            $node->appendChild($document->createElement('CountryCode', $this->getCountryCode()));
        }
        if (null !== $this->getPostcodePrimaryHigh()) {
            $node->appendChild($document->createElement('PostcodePrimaryHigh', $this->getPostcodePrimaryHigh()));
        }
        if (null !== $this->getPostcodePrimaryLow()) {
            $node->appendChild($document->createElement('PostcodePrimaryLow', $this->getPostcodePrimaryLow()));
        }
        if (null !== $this->getResidentialAddressIndicator()) {
            $node->appendChild($this->getResidentialAddressIndicator()->toNode($document));
        }
        return $node;
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
     * @param string $country
     * @return $this
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
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
     * @param string $postcodePrimaryHigh
     * @return $this
     */
    public function setPostcodePrimaryHigh($postcodePrimaryHigh)
    {
        $this->postcodePrimaryHigh = $postcodePrimaryHigh;
        return $this;
    }

    /**
     * @return string
     */
    public function getPostcodePrimaryHigh()
    {
        return $this->postcodePrimaryHigh;
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

    /**
     * @param \Ups\Entity\TimeInTransitRequest\ResidentialAddressIndicator $residentialAddressIndicator
     * @return $this
     */
    public function setResidentialAddressIndicator($residentialAddressIndicator)
    {
        $this->residentialAddressIndicator = $residentialAddressIndicator;
        return $this;
    }

    /**
     * @return \Ups\Entity\TimeInTransitRequest\ResidentialAddressIndicator
     */
    public function getResidentialAddressIndicator()
    {
        return $this->residentialAddressIndicator;
    }

}
