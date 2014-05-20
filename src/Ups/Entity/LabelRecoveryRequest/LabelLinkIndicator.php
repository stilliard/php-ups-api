<?php
namespace Ups\Entity\LabelRecoveryRequest;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  LabelLinkIndicator implements NodeInterface
{
    function __construct($attributes = null)
    {
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

        $node = $document->createElement('LabelLinkIndicator');
        return $node;
    }

}
