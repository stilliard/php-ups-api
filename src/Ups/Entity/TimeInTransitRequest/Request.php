<?php
namespace Ups\Entity\TimeInTransitRequest;

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
     * @var \Ups\Entity\TimeInTransitRequest\TransactionReference
     */
    private $transactionReference;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->RequestAction)) {
                $this->setRequestAction($attributes->RequestAction);
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
     * @param \Ups\Entity\TimeInTransitRequest\TransactionReference $transactionReference
     * @return $this
     */
    public function setTransactionReference($transactionReference)
    {
        $this->transactionReference = $transactionReference;
        return $this;
    }

    /**
     * @return \Ups\Entity\TimeInTransitRequest\TransactionReference
     */
    public function getTransactionReference()
    {
        return $this->transactionReference;
    }

}
