<?php
namespace Ups\Entity\RateRequest;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  PickupOptions implements NodeInterface
{
    /**
     * @var string
     */
    private $liftGateAtPickupIndicator;

    /**
     * @var string
     */
    private $holdForPickupIndicator;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->LiftGateAtPickupIndicator)) {
                $this->setLiftGateAtPickupIndicator($attributes->LiftGateAtPickupIndicator);
            }
            if (isset($attributes->HoldForPickupIndicator)) {
                $this->setHoldForPickupIndicator($attributes->HoldForPickupIndicator);
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

        $node = $document->createElement('PickupOptions');
        if (null !== $this->getLiftGateAtPickupIndicator()) {
            $node->appendChild($document->createElement('LiftGateAtPickupIndicator', $this->getLiftGateAtPickupIndicator()));
        }
        if (null !== $this->getHoldForPickupIndicator()) {
            $node->appendChild($document->createElement('HoldForPickupIndicator', $this->getHoldForPickupIndicator()));
        }
        return $node;
    }

    /**
     * @param string $liftGateAtPickupIndicator
     * @return $this
     */
    public function setLiftGateAtPickupIndicator($liftGateAtPickupIndicator)
    {
        $this->liftGateAtPickupIndicator = $liftGateAtPickupIndicator;
        return $this;
    }

    /**
     * @return string
     */
    public function getLiftGateAtPickupIndicator()
    {
        return $this->liftGateAtPickupIndicator;
    }

    /**
     * @param string $holdForPickupIndicator
     * @return $this
     */
    public function setHoldForPickupIndicator($holdForPickupIndicator)
    {
        $this->holdForPickupIndicator = $holdForPickupIndicator;
        return $this;
    }

    /**
     * @return string
     */
    public function getHoldForPickupIndicator()
    {
        return $this->holdForPickupIndicator;
    }

}
