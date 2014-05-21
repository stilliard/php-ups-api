<?php
namespace Ups\Entity\TrackResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  DestinationPortDetails implements NodeInterface
{
    /**
     * @var string
     */
    private $destinationPort;

    /**
     * @var \Ups\Entity\TrackResponse\EstimatedArrival
     */
    private $estimatedArrival;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->DestinationPort)) {
                $this->setDestinationPort($attributes->DestinationPort);
            }
            if (isset($attributes->EstimatedArrival)) {
                $this->setEstimatedArrival(new EstimatedArrival($attributes->EstimatedArrival));
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

        $node = $document->createElement('DestinationPortDetails');
        if (null !== $this->getDestinationPort()) {
            $node->appendChild($document->createElement('DestinationPort', $this->getDestinationPort()));
        }
        if (null !== $this->getEstimatedArrival()) {
            $node->appendChild($this->getEstimatedArrival()->toNode($document));
        }
        return $node;
    }

    /**
     * @param string $destinationPort
     * @return $this
     */
    public function setDestinationPort($destinationPort)
    {
        $this->destinationPort = $destinationPort;
        return $this;
    }

    /**
     * @return string
     */
    public function getDestinationPort()
    {
        return $this->destinationPort;
    }

    /**
     * @param \Ups\Entity\TrackResponse\EstimatedArrival $estimatedArrival
     * @return $this
     */
    public function setEstimatedArrival($estimatedArrival)
    {
        $this->estimatedArrival = $estimatedArrival;
        return $this;
    }

    /**
     * @return \Ups\Entity\TrackResponse\EstimatedArrival
     */
    public function getEstimatedArrival()
    {
        return $this->estimatedArrival;
    }

}
