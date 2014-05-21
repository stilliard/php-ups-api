<?php
namespace Ups\Entity\QuantumViewResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  Response implements NodeInterface
{
    /**
     * @var \Ups\Entity\QuantumViewResponse\TransactionReference
     */
    private $transactionReference;

    /**
     * @var string
     */
    private $responseStatusCode;

    /**
     * @var string
     */
    private $responseStatusDescription;

    /**
     * @var array
     */
    private $error;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->TransactionReference)) {
                $this->setTransactionReference(new TransactionReference($attributes->TransactionReference));
            }
            if (isset($attributes->ResponseStatusCode)) {
                $this->setResponseStatusCode($attributes->ResponseStatusCode);
            }
            if (isset($attributes->ResponseStatusDescription)) {
                $this->setResponseStatusDescription($attributes->ResponseStatusDescription);
            }
            if (isset($attributes->Error)) {
                $error = $this->getError();
                foreach ($attributes->Error as $item) {
                    $error[] = new Error($item);
                }
                $this->setError($error);
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

        $node = $document->createElement('Response');
        if (null !== $this->getTransactionReference()) {
            $node->appendChild($this->getTransactionReference()->toNode($document));
        }
        $node->appendChild($document->createElement('ResponseStatusCode', $this->getResponseStatusCode()));
        if (null !== $this->getResponseStatusDescription()) {
            $node->appendChild($document->createElement('ResponseStatusDescription', $this->getResponseStatusDescription()));
        }
        if (null !== $this->getError()) {
            if (count($this->getError()) > 0) {
                foreach ($this->getError() as $Error) {
                    $node->appendChild($Error->toNode($document));
                }
            }
        }
        return $node;
    }

    /**
     * @param \Ups\Entity\QuantumViewResponse\TransactionReference $transactionReference
     * @return $this
     */
    public function setTransactionReference($transactionReference)
    {
        $this->transactionReference = $transactionReference;
        return $this;
    }

    /**
     * @return \Ups\Entity\QuantumViewResponse\TransactionReference
     */
    public function getTransactionReference()
    {
        return $this->transactionReference;
    }

    /**
     * @param string $responseStatusCode
     * @return $this
     */
    public function setResponseStatusCode($responseStatusCode)
    {
        $this->responseStatusCode = $responseStatusCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getResponseStatusCode()
    {
        return $this->responseStatusCode;
    }

    /**
     * @param string $responseStatusDescription
     * @return $this
     */
    public function setResponseStatusDescription($responseStatusDescription)
    {
        $this->responseStatusDescription = $responseStatusDescription;
        return $this;
    }

    /**
     * @return string
     */
    public function getResponseStatusDescription()
    {
        return $this->responseStatusDescription;
    }

    /**
     * @param array $error
     * @return $this
     */
    public function setError($error)
    {
        $this->error = $error;
        return $this;
    }

    /**
     * @return array
     */
    public function getError()
    {
        return $this->error;
    }

}
