<?php
namespace Ups\Entity;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class LabelRecoveryResponse implements NodeInterface
{
    /**
     * @var string
     */
    private $shipmentIdentificationNumber;

    /**
     * @var \Ups\Entity\LabelResults
     */
    private $labelResults;

    /**
     * @var \Ups\Entity\TrackingCandidate
     */
    private $trackingCandidate;

    function __construct($attributes = null)
    {
        $this->setLabelResults(new LabelResults());

        if (null !== $attributes) {
            if (isset($attributes->ShipmentIdentificationNumber)) {
                $this->setShipmentIdentificationNumber($attributes->ShipmentIdentificationNumber);
            }
            if (isset($attributes->LabelResults)) {
                $this->setLabelResults(new LabelResults($attributes->LabelResults));
            }
            if (isset($attributes->TrackingCandidate)) {
                $this->setTrackingCandidate(new TrackingCandidate($attributes->TrackingCandidate));
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

        $node = $document->createElement('LabelRecoveryResponse');
        $node->appendChild($document->createElement('ShipmentIdentificationNumber', $this->getShipmentIdentificationNumber()));
        $node->appendChild($this->getLabelResults()->toNode($document));
        $node->appendChild($this->getTrackingCandidate()->toNode($document));
        return $node;
    }

    /**
     * @param \Ups\Entity\LabelResults $labelResults
     * @return $this
     */
    public function setLabelResults($labelResults)
    {
        $this->labelResults = $labelResults;
        return $this;
    }

    /**
     * @return \Ups\Entity\LabelResults
     */
    public function getLabelResults()
    {
        return $this->labelResults;
    }

    /**
     * @param string $shipmentIdentificationNumber
     * @return $this
     */
    public function setShipmentIdentificationNumber($shipmentIdentificationNumber)
    {
        $this->shipmentIdentificationNumber = $shipmentIdentificationNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getShipmentIdentificationNumber()
    {
        return $this->shipmentIdentificationNumber;
    }

    /**
     * @param \Ups\Entity\TrackingCandidate $trackingCandidate
     * @return $this
     */
    public function setTrackingCandidate($trackingCandidate)
    {
        $this->trackingCandidate = $trackingCandidate;
        return $this;
    }

    /**
     * @return \Ups\Entity\TrackingCandidate
     */
    public function getTrackingCandidate()
    {
        return $this->trackingCandidate;
    }

}
