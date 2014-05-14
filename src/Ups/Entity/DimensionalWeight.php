<?php
namespace Ups\Entity;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class DimensionalWeight implements NodeInterface
{
    /**
     * @var \Ups\Entity\UnitOfMeasurement
     */
    private $unitOfMeasurement;

    /**
     * @var string
     */
    private $weight;

    function __construct($attributes = null)
    {
        $this->setUnitOfMeasurement(new UnitOfMeasurement());

        if (null !== $attributes) {
            if (isset($attributes->UnitOfMeasurement)) {
                $this->setWeight(new UnitOfMeasurement($attributes->UnitOfMeasurement));
            }
            if (isset($attributes->Weight)) {
                $this->setWeight($attributes->Weight);
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

        $node = $document->createElement('DimensionalWeight');
        $node->appendChild($this->getUnitOfMeasurement()->toNode($document));
        $node->appendChild($document->createElement('Weight', $this->getWeight()));
        return $node;
    }

    /**
     * @param \Ups\Entity\UnitOfMeasurement $unitOfMeasurement
     * @return $this
     */
    public function setUnitOfMeasurement($unitOfMeasurement)
    {
        $this->unitOfMeasurement = $unitOfMeasurement;
        return $this;
    }

    /**
     * @return \Ups\Entity\UnitOfMeasurement
     */
    public function getUnitOfMeasurement()
    {
        return $this->unitOfMeasurement;
    }

    /**
     * @param string $weight
     * @return $this
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * @return string
     */
    public function getWeight()
    {
        return $this->weight;
    }

}
