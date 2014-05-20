<?php
namespace Ups\Entity\LabelRecoveryRequest;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  LabelSpecification implements NodeInterface
{
    /**
     * @var string
     */
    private $hTTPUserAgent;

    /**
     * @var \Ups\Entity\LabelRecoveryRequest\LabelImageFormat
     */
    private $labelImageFormat;

    function __construct($attributes = null)
    {
        $this->setLabelImageFormat(new LabelImageFormat());

        if (null !== $attributes) {
            if (isset($attributes->HTTPUserAgent)) {
                $this->setHTTPUserAgent($attributes->HTTPUserAgent);
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
        if (null !== $this->getHTTPUserAgent()) {
            $node->appendChild($document->createElement('HTTPUserAgent', $this->getHTTPUserAgent()));
        }
        $node->appendChild($this->getLabelImageFormat()->toNode($document));
        return $node;
    }

    /**
     * @param string $hTTPUserAgent
     * @return $this
     */
    public function setHTTPUserAgent($hTTPUserAgent)
    {
        $this->hTTPUserAgent = $hTTPUserAgent;
        return $this;
    }

    /**
     * @return string
     */
    public function getHTTPUserAgent()
    {
        return $this->hTTPUserAgent;
    }

    /**
     * @param \Ups\Entity\LabelRecoveryRequest\LabelImageFormat $labelImageFormat
     * @return $this
     */
    public function setLabelImageFormat($labelImageFormat)
    {
        $this->labelImageFormat = $labelImageFormat;
        return $this;
    }

    /**
     * @return \Ups\Entity\LabelRecoveryRequest\LabelImageFormat
     */
    public function getLabelImageFormat()
    {
        return $this->labelImageFormat;
    }

}
