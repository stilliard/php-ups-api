<?php
namespace Ups\Entity\RateRequest;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  Schedule implements NodeInterface
{
    /**
     * @var string
     */
    private $pickupDay;

    /**
     * @var string
     */
    private $method;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->PickupDay)) {
                $this->setPickupDay($attributes->PickupDay);
            }
            if (isset($attributes->Method)) {
                $this->setMethod($attributes->Method);
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

        $node = $document->createElement('Schedule');
        if (null !== $this->getPickupDay()) {
            $node->appendChild($document->createElement('PickupDay', $this->getPickupDay()));
        }
        if (null !== $this->getMethod()) {
            $node->appendChild($document->createElement('Method', $this->getMethod()));
        }
        return $node;
    }

    /**
     * @param string $pickupDay
     * @return $this
     */
    public function setPickupDay($pickupDay)
    {
        $this->pickupDay = $pickupDay;
        return $this;
    }

    /**
     * @return string
     */
    public function getPickupDay()
    {
        return $this->pickupDay;
    }

    /**
     * @param string $method
     * @return $this
     */
    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

}
