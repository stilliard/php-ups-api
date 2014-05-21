<?php
namespace Ups\Entity\TrackResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  TransactionReference implements NodeInterface
{
    /**
     * @var string
     */
    private $customerContext;

    /**
     * @var string
     */
    private $transactionIdentifier;

    /**
     * @var string
     */
    private $xpciVersion;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->CustomerContext)) {
                $this->setCustomerContext($attributes->CustomerContext);
            }
            if (isset($attributes->TransactionIdentifier)) {
                $this->setTransactionIdentifier($attributes->TransactionIdentifier);
            }
            if (isset($attributes->XpciVersion)) {
                $this->setXpciVersion($attributes->XpciVersion);
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

        $node = $document->createElement('TransactionReference');
        if (null !== $this->getCustomerContext()) {
            $node->appendChild($document->createElement('CustomerContext', $this->getCustomerContext()));
        }
        if (null !== $this->getTransactionIdentifier()) {
            $node->appendChild($document->createElement('TransactionIdentifier', $this->getTransactionIdentifier()));
        }
        if (null !== $this->getXpciVersion()) {
            $node->appendChild($document->createElement('XpciVersion', $this->getXpciVersion()));
        }
        return $node;
    }

    /**
     * @param string $customerContext
     * @return $this
     */
    public function setCustomerContext($customerContext)
    {
        $this->customerContext = $customerContext;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerContext()
    {
        return $this->customerContext;
    }

    /**
     * @param string $transactionIdentifier
     * @return $this
     */
    public function setTransactionIdentifier($transactionIdentifier)
    {
        $this->transactionIdentifier = $transactionIdentifier;
        return $this;
    }

    /**
     * @return string
     */
    public function getTransactionIdentifier()
    {
        return $this->transactionIdentifier;
    }

    /**
     * @param string $xpciVersion
     * @return $this
     */
    public function setXpciVersion($xpciVersion)
    {
        $this->xpciVersion = $xpciVersion;
        return $this;
    }

    /**
     * @return string
     */
    public function getXpciVersion()
    {
        return $this->xpciVersion;
    }

}
