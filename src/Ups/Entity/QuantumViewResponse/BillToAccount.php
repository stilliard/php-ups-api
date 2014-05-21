<?php
namespace Ups\Entity\QuantumViewResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  BillToAccount implements NodeInterface
{
    /**
     * @var string
     */
    private $option;

    /**
     * @var string
     */
    private $number;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->Option)) {
                $this->setOption($attributes->Option);
            }
            if (isset($attributes->Number)) {
                $this->setNumber($attributes->Number);
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

        $node = $document->createElement('BillToAccount');
        $node->appendChild($document->createElement('Option', $this->getOption()));
        $node->appendChild($document->createElement('Number', $this->getNumber()));
        return $node;
    }

    /**
     * @param string $option
     * @return $this
     */
    public function setOption($option)
    {
        $this->option = $option;
        return $this;
    }

    /**
     * @return string
     */
    public function getOption()
    {
        return $this->option;
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

}
