<?php
namespace Ups\Entity\LabelRecoveryResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  Error implements NodeInterface
{
    /**
     * @var string
     */
    private $errorSeverity;

    /**
     * @var string
     */
    private $errorCode;

    /**
     * @var string
     */
    private $errorDescription;

    /**
     * @var string
     */
    private $minimumRetrySeconds;

    /**
     * @var array
     */
    private $errorLocation;

    /**
     * @var array
     */
    private $errorDigest;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->ErrorSeverity)) {
                $this->setErrorSeverity($attributes->ErrorSeverity);
            }
            if (isset($attributes->ErrorCode)) {
                $this->setErrorCode($attributes->ErrorCode);
            }
            if (isset($attributes->ErrorDescription)) {
                $this->setErrorDescription($attributes->ErrorDescription);
            }
            if (isset($attributes->MinimumRetrySeconds)) {
                $this->setMinimumRetrySeconds($attributes->MinimumRetrySeconds);
            }
            if (isset($attributes->ErrorLocation)) {
                $errorLocation = $this->getErrorLocation();
                foreach ($attributes->ErrorLocation as $item) {
                    $errorLocation[] = new ErrorLocation($item);
                }
                $this->setErrorLocation($errorLocation);
            }
            if (isset($attributes->ErrorDigest)) {
                $errorDigest = $this->getErrorDigest();
                foreach ($attributes->ErrorDigest as $item) {
                    $errorDigest[] = $item;
                }
                $this->setErrorDigest($errorDigest);
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

        $node = $document->createElement('Error');
        $node->appendChild($document->createElement('ErrorSeverity', $this->getErrorSeverity()));
        $node->appendChild($document->createElement('ErrorCode', $this->getErrorCode()));
        if (null !== $this->getErrorDescription()) {
            $node->appendChild($document->createElement('ErrorDescription', $this->getErrorDescription()));
        }
        if (null !== $this->getMinimumRetrySeconds()) {
            $node->appendChild($document->createElement('MinimumRetrySeconds', $this->getMinimumRetrySeconds()));
        }
        if (null !== $this->getErrorLocation()) {
            if (count($this->getErrorLocation()) > 0) {
                foreach ($this->getErrorLocation() as $ErrorLocation) {
                    $node->appendChild($ErrorLocation->toNode($document));
                }
            }
        }
        if (null !== $this->getErrorDigest()) {
            if (count($this->getErrorDigest()) > 0) {
                foreach ($this->getErrorDigest() as $ErrorDigest) {
                    $node->appendChild($document->createElement('ErrorDigest', $ErrorDigest));
                }
            }
        }
        return $node;
    }

    /**
     * @param string $errorSeverity
     * @return $this
     */
    public function setErrorSeverity($errorSeverity)
    {
        $this->errorSeverity = $errorSeverity;
        return $this;
    }

    /**
     * @return string
     */
    public function getErrorSeverity()
    {
        return $this->errorSeverity;
    }

    /**
     * @param string $errorCode
     * @return $this
     */
    public function setErrorCode($errorCode)
    {
        $this->errorCode = $errorCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @param string $errorDescription
     * @return $this
     */
    public function setErrorDescription($errorDescription)
    {
        $this->errorDescription = $errorDescription;
        return $this;
    }

    /**
     * @return string
     */
    public function getErrorDescription()
    {
        return $this->errorDescription;
    }

    /**
     * @param string $minimumRetrySeconds
     * @return $this
     */
    public function setMinimumRetrySeconds($minimumRetrySeconds)
    {
        $this->minimumRetrySeconds = $minimumRetrySeconds;
        return $this;
    }

    /**
     * @return string
     */
    public function getMinimumRetrySeconds()
    {
        return $this->minimumRetrySeconds;
    }

    /**
     * @param array $errorLocation
     * @return $this
     */
    public function setErrorLocation($errorLocation)
    {
        $this->errorLocation = $errorLocation;
        return $this;
    }

    /**
     * @return array
     */
    public function getErrorLocation()
    {
        return $this->errorLocation;
    }

    /**
     * @param array $errorDigest
     * @return $this
     */
    public function setErrorDigest($errorDigest)
    {
        $this->errorDigest = $errorDigest;
        return $this;
    }

    /**
     * @return array
     */
    public function getErrorDigest()
    {
        return $this->errorDigest;
    }

}
