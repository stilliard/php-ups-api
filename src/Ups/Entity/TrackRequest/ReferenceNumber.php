<?php
namespace Ups\Entity\TrackRequest;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  ReferenceNumber implements NodeInterface
{
    /**
     * @var string
     */
    private $value;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->Value)) {
                $this->setValue($attributes->Value);
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

        $node = $document->createElement('ReferenceNumber');
        $node->appendChild($document->createElement('Value', $this->getValue()));
        return $node;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

}
