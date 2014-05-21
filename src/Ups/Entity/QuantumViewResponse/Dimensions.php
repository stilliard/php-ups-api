<?php
namespace Ups\Entity\QuantumViewResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  Dimensions implements NodeInterface
{
    /**
     * @var string
     */
    private $length;

    /**
     * @var string
     */
    private $width;

    /**
     * @var string
     */
    private $height;

    /**
     * @var \Ups\Entity\QuantumViewResponse\UnitOfMeasurement
     */
    private $unitOfMeasurement;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->Length)) {
                $this->setLength($attributes->Length);
            }
            if (isset($attributes->Width)) {
                $this->setWidth($attributes->Width);
            }
            if (isset($attributes->Height)) {
                $this->setHeight($attributes->Height);
            }
            if (isset($attributes->UnitOfMeasurement)) {
                $this->setUnitOfMeasurement(new UnitOfMeasurement($attributes->UnitOfMeasurement));
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

        $node = $document->createElement('Dimensions');
        $node->appendChild($document->createElement('Length', $this->getLength()));
        $node->appendChild($document->createElement('Width', $this->getWidth()));
        $node->appendChild($document->createElement('Height', $this->getHeight()));
        if (null !== $this->getUnitOfMeasurement()) {
            $node->appendChild($this->getUnitOfMeasurement()->toNode($document));
        }
        return $node;
    }

    /**
     * @param string $length
     * @return $this
     */
    public function setLength($length)
    {
        $this->length = $length;
        return $this;
    }

    /**
     * @return string
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param string $width
     * @return $this
     */
    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @return string
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param string $height
     * @return $this
     */
    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return string
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param \Ups\Entity\QuantumViewResponse\UnitOfMeasurement $unitOfMeasurement
     * @return $this
     */
    public function setUnitOfMeasurement($unitOfMeasurement)
    {
        $this->unitOfMeasurement = $unitOfMeasurement;
        return $this;
    }

    /**
     * @return \Ups\Entity\QuantumViewResponse\UnitOfMeasurement
     */
    public function getUnitOfMeasurement()
    {
        return $this->unitOfMeasurement;
    }

}
