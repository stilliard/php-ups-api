<?php
namespace Ups\Entity\QuantumViewResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  AddressExtendedInformation implements NodeInterface
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $low;

    /**
     * @var string
     */
    private $high;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->Type)) {
                $this->setType($attributes->Type);
            }
            if (isset($attributes->Low)) {
                $this->setLow($attributes->Low);
            }
            if (isset($attributes->High)) {
                $this->setHigh($attributes->High);
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

        $node = $document->createElement('AddressExtendedInformation');
        if (null !== $this->getType()) {
            $node->appendChild($document->createElement('Type', $this->getType()));
        }
        if (null !== $this->getLow()) {
            $node->appendChild($document->createElement('Low', $this->getLow()));
        }
        if (null !== $this->getHigh()) {
            $node->appendChild($document->createElement('High', $this->getHigh()));
        }
        return $node;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $low
     * @return $this
     */
    public function setLow($low)
    {
        $this->low = $low;
        return $this;
    }

    /**
     * @return string
     */
    public function getLow()
    {
        return $this->low;
    }

    /**
     * @param string $high
     * @return $this
     */
    public function setHigh($high)
    {
        $this->high = $high;
        return $this;
    }

    /**
     * @return string
     */
    public function getHigh()
    {
        return $this->high;
    }

}
