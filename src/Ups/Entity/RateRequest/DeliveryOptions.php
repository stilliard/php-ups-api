<?php
namespace Ups\Entity\RateRequest;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  DeliveryOptions implements NodeInterface
{
    /**
     * @var string
     */
    private $liftGateAtDeliveryIndicator;

    /**
     * @var string
     */
    private $dropOffAtUPSFacilityIndicator;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->LiftGateAtDeliveryIndicator)) {
                $this->setLiftGateAtDeliveryIndicator($attributes->LiftGateAtDeliveryIndicator);
            }
            if (isset($attributes->DropOffAtUPSFacilityIndicator)) {
                $this->setDropOffAtUPSFacilityIndicator($attributes->DropOffAtUPSFacilityIndicator);
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

        $node = $document->createElement('DeliveryOptions');
        if (null !== $this->getLiftGateAtDeliveryIndicator()) {
            $node->appendChild($document->createElement('LiftGateAtDeliveryIndicator', $this->getLiftGateAtDeliveryIndicator()));
        }
        if (null !== $this->getDropOffAtUPSFacilityIndicator()) {
            $node->appendChild($document->createElement('DropOffAtUPSFacilityIndicator', $this->getDropOffAtUPSFacilityIndicator()));
        }
        return $node;
    }

    /**
     * @param string $liftGateAtDeliveryIndicator
     * @return $this
     */
    public function setLiftGateAtDeliveryIndicator($liftGateAtDeliveryIndicator)
    {
        $this->liftGateAtDeliveryIndicator = $liftGateAtDeliveryIndicator;
        return $this;
    }

    /**
     * @return string
     */
    public function getLiftGateAtDeliveryIndicator()
    {
        return $this->liftGateAtDeliveryIndicator;
    }

    /**
     * @param string $dropOffAtUPSFacilityIndicator
     * @return $this
     */
    public function setDropOffAtUPSFacilityIndicator($dropOffAtUPSFacilityIndicator)
    {
        $this->dropOffAtUPSFacilityIndicator = $dropOffAtUPSFacilityIndicator;
        return $this;
    }

    /**
     * @return string
     */
    public function getDropOffAtUPSFacilityIndicator()
    {
        return $this->dropOffAtUPSFacilityIndicator;
    }

}
