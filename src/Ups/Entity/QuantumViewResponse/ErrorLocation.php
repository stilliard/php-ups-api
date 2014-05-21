<?php
namespace Ups\Entity\QuantumViewResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  ErrorLocation implements NodeInterface
{
    /**
     * @var string
     */
    private $errorLocationElementName;

    /**
     * @var string
     */
    private $errorLocationElementReference;

    /**
     * @var string
     */
    private $errorLocationAttributeName;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->ErrorLocationElementName)) {
                $this->setErrorLocationElementName($attributes->ErrorLocationElementName);
            }
            if (isset($attributes->ErrorLocationElementReference)) {
                $this->setErrorLocationElementReference($attributes->ErrorLocationElementReference);
            }
            if (isset($attributes->ErrorLocationAttributeName)) {
                $this->setErrorLocationAttributeName($attributes->ErrorLocationAttributeName);
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

        $node = $document->createElement('ErrorLocation');
        if (null !== $this->getErrorLocationElementName()) {
            $node->appendChild($document->createElement('ErrorLocationElementName', $this->getErrorLocationElementName()));
        }
        if (null !== $this->getErrorLocationElementReference()) {
            $node->appendChild($document->createElement('ErrorLocationElementReference', $this->getErrorLocationElementReference()));
        }
        if (null !== $this->getErrorLocationAttributeName()) {
            $node->appendChild($document->createElement('ErrorLocationAttributeName', $this->getErrorLocationAttributeName()));
        }
        return $node;
    }

    /**
     * @param string $errorLocationElementName
     * @return $this
     */
    public function setErrorLocationElementName($errorLocationElementName)
    {
        $this->errorLocationElementName = $errorLocationElementName;
        return $this;
    }

    /**
     * @return string
     */
    public function getErrorLocationElementName()
    {
        return $this->errorLocationElementName;
    }

    /**
     * @param string $errorLocationElementReference
     * @return $this
     */
    public function setErrorLocationElementReference($errorLocationElementReference)
    {
        $this->errorLocationElementReference = $errorLocationElementReference;
        return $this;
    }

    /**
     * @return string
     */
    public function getErrorLocationElementReference()
    {
        return $this->errorLocationElementReference;
    }

    /**
     * @param string $errorLocationAttributeName
     * @return $this
     */
    public function setErrorLocationAttributeName($errorLocationAttributeName)
    {
        $this->errorLocationAttributeName = $errorLocationAttributeName;
        return $this;
    }

    /**
     * @return string
     */
    public function getErrorLocationAttributeName()
    {
        return $this->errorLocationAttributeName;
    }

}
