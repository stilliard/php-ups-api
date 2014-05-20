<?php
namespace Ups\Entity\RateRequest;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  Request implements NodeInterface
{
    /**
     * @var string
     */
    private $requestAction;

    /**
     * @var string
     */
    private $requestOption;

    /**
     * @var \Ups\Entity\RateRequest\TransactionReference
     */
    private $transactionReference;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->RequestAction)) {
                $this->setRequestAction($attributes->RequestAction);
            }
            if (isset($attributes->RequestOption)) {
                $this->setRequestOption($attributes->RequestOption);
            }
            if (isset($attributes->TransactionReference)) {
                $this->setTransactionReference(new TransactionReference($attributes->TransactionReference));
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

        $node = $document->createElement('Request');
        $node->appendChild($document->createElement('RequestAction', $this->getRequestAction()));
        if (null !== $this->getRequestOption()) {
            $node->appendChild($document->createElement('RequestOption', $this->getRequestOption()));
        }
        if (null !== $this->getTransactionReference()) {
            $node->appendChild($this->getTransactionReference()->toNode($document));
        }
        return $node;
    }

    /**
     * @param string $requestAction
     * @return $this
     */
    public function setRequestAction($requestAction)
    {
        $this->requestAction = $requestAction;
        return $this;
    }

    /**
     * @return string
     */
    public function getRequestAction()
    {
        return $this->requestAction;
    }

    /**
     * @param string $requestOption
     * @return $this
     */
    public function setRequestOption($requestOption)
    {
        $this->requestOption = $requestOption;
        return $this;
    }

    /**
     * @return string
     */
    public function getRequestOption()
    {
        return $this->requestOption;
    }

    /**
     * @param \Ups\Entity\RateRequest\TransactionReference $transactionReference
     * @return $this
     */
    public function setTransactionReference($transactionReference)
    {
        $this->transactionReference = $transactionReference;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateRequest\TransactionReference
     */
    public function getTransactionReference()
    {
        return $this->transactionReference;
    }

}
