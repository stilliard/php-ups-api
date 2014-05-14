<?php
namespace Ups\Entity;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class LabelDelivery implements NodeInterface
{
    /**
     * @var string
     */
    private $labelLinkIndicator;

    function __construct($attributes = null)
    {
        $this->setLabelLinkIndicator(null);

        if (null !== $attributes) {
            if (isset($attributes->LabelLinkIndicator)) {
                $this->setLabelLinkIndicator($attributes->LabelLinkIndicator);
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

        $node = $document->createElement('LabelDelivery');
        if (null !== $this->getLabelLinkIndicator()) {
            $node->appendChild($document->createElement('LabelLinkIndicator', $this->getLabelLinkIndicator()));
        }
        return $node;
    }

    /**
     * @param string $labelLinkIndicator
     * @return $this
     */
    public function setLabelLinkIndicator($labelLinkIndicator)
    {
        $this->labelLinkIndicator = $labelLinkIndicator;
        return $this;
    }

    /**
     * @return string
     */
    public function getLabelLinkIndicator()
    {
        return $this->labelLinkIndicator;
    }

}
