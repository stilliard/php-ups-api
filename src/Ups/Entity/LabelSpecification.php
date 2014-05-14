<?php
namespace Ups\Entity;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class LabelSpecification implements NodeInterface
{
    /**
     * @var string
     */
    private $httpUserAgent;

    /**
     * @var \Ups\Entity\LabelImageFormat
     */
    private $labelImageFormat;

    function __construct($attributes = null)
    {
        $this->setLabelImageFormat(new LabelImageFormat());

        if (null !== $attributes) {
            if (isset($attributes->HTTPUserAgent)) {
                $this->setHttpUserAgent($attributes->HTTPUserAgent);
            }
            if (isset($attributes->LabelImageFormat)) {
                $this->setLabelImageFormat(new LabelImageFormat($attributes->LabelImageFormat));
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

        $node = $document->createElement('LabelSpecification');
        $node->appendChild($document->createElement('HTTPUserAgent', $this->getHttpUserAgent()));
        $node->appendChild($this->getLabelImageFormat()->toNode($document));
        return $node;
    }

    /**
     * @param string $httpUserAgent
     * @return $this
     */
    public function setHttpUserAgent($httpUserAgent)
    {
        $this->httpUserAgent = $httpUserAgent;
        return $this;
    }

    /**
     * @return string
     */
    public function getHttpUserAgent()
    {
        return $this->httpUserAgent;
    }

    /**
     * @param \Ups\Entity\LabelImageFormat $labelImageFormat
     * @return $this
     */
    public function setLabelImageFormat($labelImageFormat)
    {
        $this->labelImageFormat = $labelImageFormat;
        return $this;
    }

    /**
     * @return \Ups\Entity\LabelImageFormat
     */
    public function getLabelImageFormat()
    {
        return $this->labelImageFormat;
    }

}
