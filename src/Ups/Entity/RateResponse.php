<?php
namespace Ups\Entity;

use DOMDocument;
use DOMElement;
use DOMNode;
use Ups\NodeInterface;

class RateResponse implements NodeInterface
{
    /**
     * @var array
     */
    private $ratedShipment;

    function __construct($attributes = null)
    {
        $this->setRatedShipment(array());

        if (null !== $attributes) {
            if (isset($attributes->RatedShipment)) {
                $ratedShipment = $this->getRatedShipment();
                if (is_array($attributes->RatedShipment)) {
                    foreach ($attributes->RatedShipment as $item) {
                        $ratedShipment[] = new RatedShipment($item);
                    }
                } else {
                    $ratedShipment[] = new RatedShipment($attributes->RatedShipment);
                }
                $this->setRatedShipment($ratedShipment);
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

        $node = $document->createElement('RateResponse');
        if (count($this->getRatedShipment()) > 0) {
            foreach ($this->getRatedShipment() as $ratedShipment) {
                $node->appendChild($ratedShipment->toNode($document));
            }
        }
        return $node;
    }

    /**
     * @param array $ratedShipment
     * @return $this
     */
    public function setRatedShipment($ratedShipment)
    {
        $this->ratedShipment = $ratedShipment;
        return $this;
    }

    /**
     * @return array
     */
    public function getRatedShipment()
    {
        return $this->ratedShipment;
    }

}
