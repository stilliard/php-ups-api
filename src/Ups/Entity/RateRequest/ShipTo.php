<?php
namespace Ups\Entity\RateRequest;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  ShipTo implements NodeInterface
{
    /**
     * @var string
     */
    private $companyName;

    /**
     * @var \Ups\Entity\RateRequest\Address
     */
    private $address;

    function __construct($attributes = null)
    {
        $this->setAddress(new Address());

        if (null !== $attributes) {
            if (isset($attributes->CompanyName)) {
                $this->setCompanyName($attributes->CompanyName);
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

        $node = $document->createElement('ShipTo');
        if (null !== $this->getCompanyName()) {
            $node->appendChild($document->createElement('CompanyName', $this->getCompanyName()));
        }
        $node->appendChild($this->getAddress()->toNode($document));
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
     * @param \Ups\Entity\RateRequest\Address $address
     * @return $this
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateRequest\Address
     */
    public function getAddress()
    {
        return $this->address;
    }

}
