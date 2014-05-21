<?php
namespace Ups\Entity\QuantumViewResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  CallTagARS implements NodeInterface
{
    /**
     * @var string
     */
    private $number;

    /**
     * @var string
     */
    private $code;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->Number)) {
                $this->setNumber($attributes->Number);
            }
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

        $node = $document->createElement('CallTagARS');
        if (null !== $this->getNumber()) {
            $node->appendChild($document->createElement('Number', $this->getNumber()));
        }
        if (null !== $this->getCode()) {
            $node->appendChild($document->createElement('Code', $this->getCode()));
        }
        return $node;
    }

    /**
     * @param string $number
     * @return $this
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
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
