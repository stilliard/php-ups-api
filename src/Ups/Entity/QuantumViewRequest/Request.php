<?php
namespace Ups\Entity\QuantumViewRequest;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  Request implements NodeInterface
{
    /**
     * @var \Ups\Entity\QuantumViewRequest\TransactionReference
     */
    private $transactionReference;

    /**
     * @var string
     */
    private $requestAction;

    /**
     * @var \Ups\Entity\QuantumViewRequest\IntegrationIndicator
     */
    private $integrationIndicator;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->TransactionReference)) {
                $this->setTransactionReference(new TransactionReference($attributes->TransactionReference));
            }
            if (isset($attributes->RequestAction)) {
                $this->setRequestAction($attributes->RequestAction);
            }
            if (isset($attributes->IntegrationIndicator)) {
                $this->setIntegrationIndicator(new IntegrationIndicator($attributes->IntegrationIndicator));
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
        if (null !== $this->getTransactionReference()) {
            $node->appendChild($this->getTransactionReference()->toNode($document));
        }
        $node->appendChild($document->createElement('RequestAction', $this->getRequestAction()));
        if (null !== $this->getIntegrationIndicator()) {
            $node->appendChild($this->getIntegrationIndicator()->toNode($document));
        }
        return $node;
    }

    /**
     * @param \Ups\Entity\QuantumViewRequest\TransactionReference $transactionReference
     * @return $this
     */
    public function setTransactionReference($transactionReference)
    {
        $this->transactionReference = $transactionReference;
        return $this;
    }

    /**
     * @return \Ups\Entity\QuantumViewRequest\TransactionReference
     */
    public function getTransactionReference()
    {
        return $this->transactionReference;
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
     * @param \Ups\Entity\QuantumViewRequest\IntegrationIndicator $integrationIndicator
     * @return $this
     */
    public function setIntegrationIndicator($integrationIndicator)
    {
        $this->integrationIndicator = $integrationIndicator;
        return $this;
    }

    /**
     * @return \Ups\Entity\QuantumViewRequest\IntegrationIndicator
     */
    public function getIntegrationIndicator()
    {
        return $this->integrationIndicator;
    }

}
