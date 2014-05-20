<?php
namespace Ups\Entity\LabelRecoveryResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  LabelRecoveryResponse implements NodeInterface
{
    /**
     * @var \Ups\Entity\LabelRecoveryResponse\Response
     */
    private $response;

    /**
     * @var string
     */
    private $shipmentIdentificationNumber;

    /**
     * @var \Ups\Entity\LabelRecoveryResponse\LabelResults
     */
    private $labelResults;

    /**
     * @var \Ups\Entity\LabelRecoveryResponse\TrackingCandidate
     */
    private $trackingCandidate;

    function __construct($attributes = null)
    {
        $this->setResponse(new Response());
        $this->setLabelResults(new LabelResults());
        $this->setTrackingCandidate(new TrackingCandidate());

        if (null !== $attributes) {
            if (isset($attributes->Response)) {
                $this->setResponse(new Response($attributes->Response));
            }
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
        $node->appendChild($this->getResponse()->toNode($document));
        if (null !== $this->getShipmentIdentificationNumber()) {
            $node->appendChild($document->createElement('ShipmentIdentificationNumber', $this->getShipmentIdentificationNumber()));
        }
        $node->appendChild($this->getLabelResults()->toNode($document));
        $node->appendChild($this->getTrackingCandidate()->toNode($document));
        return $node;
    }

    /**
     * @param \Ups\Entity\LabelRecoveryResponse\Response $response
     * @return $this
     */
    public function setResponse($response)
    {
        $this->response = $response;
        return $this;
    }

    /**
     * @return \Ups\Entity\LabelRecoveryResponse\Response
     */
    public function getResponse()
    {
        return $this->response;
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
     * @param \Ups\Entity\LabelRecoveryResponse\LabelResults $labelResults
     * @return $this
     */
    public function setLabelResults($labelResults)
    {
        $this->labelResults = $labelResults;
        return $this;
    }

    /**
     * @return \Ups\Entity\LabelRecoveryResponse\LabelResults
     */
    public function getLabelResults()
    {
        return $this->labelResults;
    }

    /**
     * @param \Ups\Entity\LabelRecoveryResponse\TrackingCandidate $trackingCandidate
     * @return $this
     */
    public function setTrackingCandidate($trackingCandidate)
    {
        $this->trackingCandidate = $trackingCandidate;
        return $this;
    }

    /**
     * @return \Ups\Entity\LabelRecoveryResponse\TrackingCandidate
     */
    public function getTrackingCandidate()
    {
        return $this->trackingCandidate;
    }

}
