<?php
namespace Ups\Entity\RateRequest;

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
    private $toolVersion;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->CustomerContext)) {
                $this->setCustomerContext($attributes->CustomerContext);
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
