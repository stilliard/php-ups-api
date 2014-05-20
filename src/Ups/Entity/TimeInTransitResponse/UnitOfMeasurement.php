<?php
namespace Ups\Entity\TimeInTransitResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  UnitOfMeasurement implements NodeInterface
{
    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $description;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->Code)) {
                $this->setCode($attributes->Code);
            }
            if (isset($attributes->Description)) {
                $this->setDescription($attributes->Description);
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

        $node = $document->createElement('UnitOfMeasurement');
        $node->appendChild($document->createElement('Code', $this->getCode()));
        if (null !== $this->getDescription()) {
            $node->appendChild($document->createElement('Description', $this->getDescription()));
        }
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

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

}
