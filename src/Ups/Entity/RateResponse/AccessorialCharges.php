<?php
namespace Ups\Entity\RateResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  AccessorialCharges implements NodeInterface
{
    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $currencyCode;

    /**
     * @var string
     */
    private $monetaryValue;

    /**
     * @var string
     */
    private $sub;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->Code)) {
                $this->setCode($attributes->Code);
            }
            if (isset($attributes->Description)) {
                $this->setDescription($attributes->Description);
            }
            if (isset($attributes->CurrencyCode)) {
                $this->setCurrencyCode($attributes->CurrencyCode);
            }
            if (isset($attributes->MonetaryValue)) {
                $this->setMonetaryValue($attributes->MonetaryValue);
            }
            if (isset($attributes->Sub)) {
                $this->setSub($attributes->Sub);
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

        $node = $document->createElement('AccessorialCharges');
        if (null !== $this->getCode()) {
            $node->appendChild($document->createElement('Code', $this->getCode()));
        }
        if (null !== $this->getDescription()) {
            $node->appendChild($document->createElement('Description', $this->getDescription()));
        }
        if (null !== $this->getCurrencyCode()) {
            $node->appendChild($document->createElement('CurrencyCode', $this->getCurrencyCode()));
        }
        $node->appendChild($document->createElement('MonetaryValue', $this->getMonetaryValue()));
        if (null !== $this->getSub()) {
            $node->appendChild($document->createElement('Sub', $this->getSub()));
        }
        return $node;
    }

    /**
     * @param string $code
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
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
     * @param string $currencyCode
     * @return $this
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * @param string $monetaryValue
     * @return $this
     */
    public function setMonetaryValue($monetaryValue)
    {
        $this->monetaryValue = $monetaryValue;
        return $this;
    }

    /**
     * @return string
     */
    public function getMonetaryValue()
    {
        return $this->monetaryValue;
    }

    /**
     * @param string $sub
     * @return $this
     */
    public function setSub($sub)
    {
        $this->sub = $sub;
        return $this;
    }

    /**
     * @return string
     */
    public function getSub()
    {
        return $this->sub;
    }

}
