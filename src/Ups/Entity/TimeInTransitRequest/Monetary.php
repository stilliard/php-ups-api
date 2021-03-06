<?php
namespace Ups\Entity\TimeInTransitRequest;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  Monetary implements NodeInterface
{
    /**
     * @var string
     */
    private $currencyCode;

    /**
     * @var string
     */
    private $monetaryValue;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->CurrencyCode)) {
                $this->setCurrencyCode($attributes->CurrencyCode);
            }
            if (isset($attributes->MonetaryValue)) {
                $this->setMonetaryValue($attributes->MonetaryValue);
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

        $node = $document->createElement('Monetary');
        if (null !== $this->getCurrencyCode()) {
            $node->appendChild($document->createElement('CurrencyCode', $this->getCurrencyCode()));
        }
        $node->appendChild($document->createElement('MonetaryValue', $this->getMonetaryValue()));
        return $node;
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

}
