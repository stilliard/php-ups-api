<?php
namespace Ups\Entity\LabelRecoveryRequest;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  Request implements NodeInterface
{
    /**
     * @var \Ups\Entity\LabelRecoveryRequest\TransactionReference
     */
    private $transactionReference;

    /**
     * @var string
     */
    private $requestAction;

    /**
     * @var array
     */
    private $requestOption;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->TransactionReference)) {
                $this->setTransactionReference(new TransactionReference($attributes->TransactionReference));
            }
            if (isset($attributes->RequestAction)) {
                $this->setRequestAction($attributes->RequestAction);
            }
            if (isset($attributes->RequestOption)) {
                $requestOption = $this->getRequestOption();
                foreach ($attributes->RequestOption as $item) {
                    $requestOption[] = $item;
                }
                $this->setRequestOption($requestOption);
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
        if (null !== $this->getRequestOption()) {
            if (count($this->getRequestOption()) > 0) {
                foreach ($this->getRequestOption() as $RequestOption) {
                    $node->appendChild($document->createElement('RequestOption', $RequestOption));
                }
            }
        }
        return $node;
    }

    /**
     * @param \Ups\Entity\LabelRecoveryRequest\TransactionReference $transactionReference
     * @return $this
     */
    public function setTransactionReference($transactionReference)
    {
        $this->transactionReference = $transactionReference;
        return $this;
    }

    /**
     * @return \Ups\Entity\LabelRecoveryRequest\TransactionReference
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
     * @param array $requestOption
     * @return $this
     */
    public function setRequestOption($requestOption)
    {
        $this->requestOption = $requestOption;
        return $this;
    }

    /**
     * @return array
     */
    public function getRequestOption()
    {
        return $this->requestOption;
    }

}
