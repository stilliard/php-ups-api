<?php
namespace Ups\Entity\TimeInTransitResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  ResidentialAddressIndicator implements NodeInterface
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

        $node = $document->createElement('ResidentialAddressIndicator');
        return $node;
    }

}
