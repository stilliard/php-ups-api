<?php
namespace Ups\Entity\QuantumViewResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  COD implements NodeInterface
{
    /**
     * @var string
     */
    private $cODCode;

    /**
     * @var \Ups\Entity\QuantumViewResponse\CODAmount
     */
    private $cODAmount;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->CODCode)) {
                $this->setCODCode($attributes->CODCode);
            }
            if (isset($attributes->CODAmount)) {
                $this->setCODAmount(new CODAmount($attributes->CODAmount));
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

        $node = $document->createElement('COD');
        if (null !== $this->getCODCode()) {
            $node->appendChild($document->createElement('CODCode', $this->getCODCode()));
        }
        if (null !== $this->getCODAmount()) {
            $node->appendChild($this->getCODAmount()->toNode($document));
        }
        return $node;
    }

    /**
     * @param string $cODCode
     * @return $this
     */
    public function setCODCode($cODCode)
    {
        $this->cODCode = $cODCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCODCode()
    {
        return $this->cODCode;
    }

    /**
     * @param \Ups\Entity\QuantumViewResponse\CODAmount $cODAmount
     * @return $this
     */
    public function setCODAmount($cODAmount)
    {
        $this->cODAmount = $cODAmount;
        return $this;
    }

    /**
     * @return \Ups\Entity\QuantumViewResponse\CODAmount
     */
    public function getCODAmount()
    {
        return $this->cODAmount;
    }

}
