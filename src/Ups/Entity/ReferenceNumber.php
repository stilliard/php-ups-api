<?php
namespace Ups\Entity;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class ReferenceNumber implements NodeInterface
{
    /**
     * @var string
     */
    private $number;

    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $value;

    /**
     * @var string
     */
    private $barCodeIndicator;

    function __construct($attributes = null)
    {
        if (null !== $attributes) {
            if (isset($attributes->BarCodeIndicator)) {
                $this->setBarCodeIndicator($attributes->BarCodeIndicator);
            }
            if (isset($attributes->Number)) {
                $this->setNumber($attributes->Number);
            }
            if (isset($attributes->Code)) {
                $this->setCode($attributes->Code);
            }
            if (isset($attributes->Value)) {
                $this->setValue($attributes->Value);
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

        $node = $document->createElement('ReferenceNumber');
        $node->appendChild($document->createElement('BarCodeIndicator', $this->getBarCodeIndicator()));
        $node->appendChild($document->createElement('Number', $this->getNumber()));
        $node->appendChild($document->createElement('Code', $this->getCode()));
        $node->appendChild($document->createElement('Value', $this->getValue()));
        return $node;
    }

    /**
     * @param string $barCodeIndicator
     * @return $this
     */
    public function setBarCodeIndicator($barCodeIndicator)
    {
        $this->barCodeIndicator = $barCodeIndicator;
        return $this;
    }

    /**
     * @return string
     */
    public function getBarCodeIndicator()
    {
        return $this->barCodeIndicator;
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
     * @param string $number
     * @return $this
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;

    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

}
