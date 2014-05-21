<?php
namespace Ups\Entity\QuantumViewResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  CustomsValue implements NodeInterface
{
    /**
     * @var string
     */
    private $monetaryValue;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
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

        $node = $document->createElement('CustomsValue');
        $node->appendChild($document->createElement('MonetaryValue', $this->getMonetaryValue()));
        return $node;
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
