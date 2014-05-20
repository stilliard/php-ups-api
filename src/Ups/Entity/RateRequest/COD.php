<?php
namespace Ups\Entity\RateRequest;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  COD implements NodeInterface
{
    /**
     * @var string
     */
    private $cODFundsCode;

    /**
     * @var \Ups\Entity\RateRequest\CODAmount
     */
    private $cODAmount;

    function __construct($attributes = null)
    {
        $this->setCODAmount(new CODAmount());

        if (null !== $attributes) {
            if (isset($attributes->CODFundsCode)) {
                $this->setCODFundsCode($attributes->CODFundsCode);
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
        if (null !== $this->getCODFundsCode()) {
            $node->appendChild($document->createElement('CODFundsCode', $this->getCODFundsCode()));
        }
        $node->appendChild($this->getCODAmount()->toNode($document));
        return $node;
    }

    /**
     * @param string $cODFundsCode
     * @return $this
     */
    public function setCODFundsCode($cODFundsCode)
    {
        $this->cODFundsCode = $cODFundsCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCODFundsCode()
    {
        return $this->cODFundsCode;
    }

    /**
     * @param \Ups\Entity\RateRequest\CODAmount $cODAmount
     * @return $this
     */
    public function setCODAmount($cODAmount)
    {
        $this->cODAmount = $cODAmount;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateRequest\CODAmount
     */
    public function getCODAmount()
    {
        return $this->cODAmount;
    }

}
