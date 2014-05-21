<?php
namespace Ups\Entity\QuantumViewResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  FailureNotification implements NodeInterface
{
    /**
     * @var string
     */
    private $failedEmailAddress;

    /**
     * @var \Ups\Entity\QuantumViewResponse\FailureNotificationCode
     */
    private $failureNotificationCode;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->FailedEmailAddress)) {
                $this->setFailedEmailAddress($attributes->FailedEmailAddress);
            }
            if (isset($attributes->FailureNotificationCode)) {
                $this->setFailureNotificationCode(new FailureNotificationCode($attributes->FailureNotificationCode));
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

        $node = $document->createElement('FailureNotification');
        if (null !== $this->getFailedEmailAddress()) {
            $node->appendChild($document->createElement('FailedEmailAddress', $this->getFailedEmailAddress()));
        }
        if (null !== $this->getFailureNotificationCode()) {
            $node->appendChild($this->getFailureNotificationCode()->toNode($document));
        }
        return $node;
    }

    /**
     * @param string $failedEmailAddress
     * @return $this
     */
    public function setFailedEmailAddress($failedEmailAddress)
    {
        $this->failedEmailAddress = $failedEmailAddress;
        return $this;
    }

    /**
     * @return string
     */
    public function getFailedEmailAddress()
    {
        return $this->failedEmailAddress;
    }

    /**
     * @param \Ups\Entity\QuantumViewResponse\FailureNotificationCode $failureNotificationCode
     * @return $this
     */
    public function setFailureNotificationCode($failureNotificationCode)
    {
        $this->failureNotificationCode = $failureNotificationCode;
        return $this;
    }

    /**
     * @return \Ups\Entity\QuantumViewResponse\FailureNotificationCode
     */
    public function getFailureNotificationCode()
    {
        return $this->failureNotificationCode;
    }

}
