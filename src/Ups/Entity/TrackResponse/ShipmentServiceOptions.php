<?php
namespace Ups\Entity\TrackResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  ShipmentServiceOptions implements NodeInterface
{
    /**
     * @var \Ups\Entity\TrackResponse\COD
     */
    private $cOD;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->COD)) {
                $this->setCOD(new COD($attributes->COD));
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

        $node = $document->createElement('ShipmentServiceOptions');
        if (null !== $this->getCOD()) {
            $node->appendChild($this->getCOD()->toNode($document));
        }
        return $node;
    }

    /**
     * @param \Ups\Entity\TrackResponse\COD $cOD
     * @return $this
     */
    public function setCOD($cOD)
    {
        $this->cOD = $cOD;
        return $this;
    }

    /**
     * @return \Ups\Entity\TrackResponse\COD
     */
    public function getCOD()
    {
        return $this->cOD;
    }

}
