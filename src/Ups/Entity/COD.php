<?php
namespace Ups\Entity;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class COD implements NodeInterface
{
    /**
     * @var string
     */
    private $codCode;

    /**
     * @var \Ups\Entity\CODAmount
     */
    private $codAmount;

    function __construct($attributes = null)
    {
        $this->setCodAmount(new CODAmount());

        if (null !== $attributes) {
            if (isset($attributes->CODCode)) {
                $this->setCodCode($attributes->CODCode);
            }
            if (isset($attributes->CODAmount)) {
                $this->setCodAmount(new CODAmount($attributes->CODAmount));
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
        $node->appendChild($document->createElement('CODCode', $this->getCODCode()));
        $node->appendChild($this->getCodAmount()->toNode($document));
        return $node;
    }

    /**
     * @param \Ups\Entity\CODAmount $codAmount
     * @return $this
     */
    public function setCodAmount($codAmount)
    {
        $this->codAmount = $codAmount;
        return $this;
    }

    /**
     * @return \Ups\Entity\CODAmount
     */
    public function getCodAmount()
    {
        return $this->codAmount;
    }

    /**
     * @param string $codCode
     * @return $this
     */
    public function setCodCode($codCode)
    {
        $this->codCode = $codCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCodCode()
    {
        return $this->codCode;
    }

}
