<?php
namespace Ups\Entity\RateResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  NetSummaryCharges implements NodeInterface
{
    /**
     * @var \Ups\Entity\RateResponse\GrandTotal
     */
    private $grandTotal;

    function __construct($attributes = null)
    {
        $this->setGrandTotal(new GrandTotal());

        if (null !== $attributes) {
            if (isset($attributes->GrandTotal)) {
                $this->setGrandTotal(new GrandTotal($attributes->GrandTotal));
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

        $node = $document->createElement('NetSummaryCharges');
        $node->appendChild($this->getGrandTotal()->toNode($document));
        return $node;
    }

    /**
     * @param \Ups\Entity\RateResponse\GrandTotal $grandTotal
     * @return $this
     */
    public function setGrandTotal($grandTotal)
    {
        $this->grandTotal = $grandTotal;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateResponse\GrandTotal
     */
    public function getGrandTotal()
    {
        return $this->grandTotal;
    }

}
