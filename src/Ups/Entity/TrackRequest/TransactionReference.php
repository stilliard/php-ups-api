<?php
namespace Ups\Entity\TrackRequest;

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
    private $toolVersion;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->CustomerContext)) {
                $this->setCustomerContext($attributes->CustomerContext);
            }
            if (isset($attributes->TransactionIdentifier)) {
                $this->setTransactionIdentifier($attributes->TransactionIdentifier);
            }
            if (isset($attributes->ToolVersion)) {
                $this->setToolVersion($attributes->ToolVersion);
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
        if (null !== $this->getToolVersion()) {
            $node->appendChild($document->createElement('ToolVersion', $this->getToolVersion()));
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
     * @param string $toolVersion
     * @return $this
     */
    public function setToolVersion($toolVersion)
    {
        $this->toolVersion = $toolVersion;
        return $this;
    }

    /**
     * @return string
     */
    public function getToolVersion()
    {
        return $this->toolVersion;
    }

}
