<?php
namespace Ups\Entity\RateRequest;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  Insurance implements NodeInterface
{
    /**
     * @var \Ups\Entity\RateRequest\BasicFlexibleParcelIndicator
     */
    private $basicFlexibleParcelIndicator;

    /**
     * @var \Ups\Entity\RateRequest\ExtendedFlexibleParcelIndicator
     */
    private $extendedFlexibleParcelIndicator;

    /**
     * @var \Ups\Entity\RateRequest\TimeInTransitFlexibleParcelIndicator
     */
    private $timeInTransitFlexibleParcelIndicator;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->BasicFlexibleParcelIndicator)) {
                $this->setBasicFlexibleParcelIndicator(new BasicFlexibleParcelIndicator($attributes->BasicFlexibleParcelIndicator));
            }
            if (isset($attributes->ExtendedFlexibleParcelIndicator)) {
                $this->setExtendedFlexibleParcelIndicator(new ExtendedFlexibleParcelIndicator($attributes->ExtendedFlexibleParcelIndicator));
            }
            if (isset($attributes->TimeInTransitFlexibleParcelIndicator)) {
                $this->setTimeInTransitFlexibleParcelIndicator(new TimeInTransitFlexibleParcelIndicator($attributes->TimeInTransitFlexibleParcelIndicator));
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

        $node = $document->createElement('Insurance');
        if (null !== $this->getBasicFlexibleParcelIndicator()) {
            $node->appendChild($this->getBasicFlexibleParcelIndicator()->toNode($document));
        }
        if (null !== $this->getExtendedFlexibleParcelIndicator()) {
            $node->appendChild($this->getExtendedFlexibleParcelIndicator()->toNode($document));
        }
        if (null !== $this->getTimeInTransitFlexibleParcelIndicator()) {
            $node->appendChild($this->getTimeInTransitFlexibleParcelIndicator()->toNode($document));
        }
        return $node;
    }

    /**
     * @param \Ups\Entity\RateRequest\BasicFlexibleParcelIndicator $basicFlexibleParcelIndicator
     * @return $this
     */
    public function setBasicFlexibleParcelIndicator($basicFlexibleParcelIndicator)
    {
        $this->basicFlexibleParcelIndicator = $basicFlexibleParcelIndicator;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateRequest\BasicFlexibleParcelIndicator
     */
    public function getBasicFlexibleParcelIndicator()
    {
        return $this->basicFlexibleParcelIndicator;
    }

    /**
     * @param \Ups\Entity\RateRequest\ExtendedFlexibleParcelIndicator $extendedFlexibleParcelIndicator
     * @return $this
     */
    public function setExtendedFlexibleParcelIndicator($extendedFlexibleParcelIndicator)
    {
        $this->extendedFlexibleParcelIndicator = $extendedFlexibleParcelIndicator;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateRequest\ExtendedFlexibleParcelIndicator
     */
    public function getExtendedFlexibleParcelIndicator()
    {
        return $this->extendedFlexibleParcelIndicator;
    }

    /**
     * @param \Ups\Entity\RateRequest\TimeInTransitFlexibleParcelIndicator $timeInTransitFlexibleParcelIndicator
     * @return $this
     */
    public function setTimeInTransitFlexibleParcelIndicator($timeInTransitFlexibleParcelIndicator)
    {
        $this->timeInTransitFlexibleParcelIndicator = $timeInTransitFlexibleParcelIndicator;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateRequest\TimeInTransitFlexibleParcelIndicator
     */
    public function getTimeInTransitFlexibleParcelIndicator()
    {
        return $this->timeInTransitFlexibleParcelIndicator;
    }

}
