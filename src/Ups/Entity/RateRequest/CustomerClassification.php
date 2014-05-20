<?php
namespace Ups\Entity\RateRequest;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  CustomerClassification implements NodeInterface
{
    /**
     * @var string
     */
    private $code;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->Code)) {
                $this->setCode($attributes->Code);
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

        $node = $document->createElement('CustomerClassification');
        $node->appendChild($document->createElement('Code', $this->getCode()));
        return $node;
    }

    /**
     * @param string $code
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

}
