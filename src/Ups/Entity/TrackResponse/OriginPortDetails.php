<?php
namespace Ups\Entity\TrackResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  OriginPortDetails implements NodeInterface
{
    /**
     * @var string
     */
    private $originPort;

    /**
     * @var \Ups\Entity\TrackResponse\EstimatedDeparture
     */
    private $estimatedDeparture;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->OriginPort)) {
                $this->setOriginPort($attributes->OriginPort);
            }
            if (isset($attributes->EstimatedDeparture)) {
                $this->setEstimatedDeparture(new EstimatedDeparture($attributes->EstimatedDeparture));
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

        $node = $document->createElement('OriginPortDetails');
        if (null !== $this->getOriginPort()) {
            $node->appendChild($document->createElement('OriginPort', $this->getOriginPort()));
        }
        if (null !== $this->getEstimatedDeparture()) {
            $node->appendChild($this->getEstimatedDeparture()->toNode($document));
        }
        return $node;
    }

    /**
     * @param string $originPort
     * @return $this
     */
    public function setOriginPort($originPort)
    {
        $this->originPort = $originPort;
        return $this;
    }

    /**
     * @return string
     */
    public function getOriginPort()
    {
        return $this->originPort;
    }

    /**
     * @param \Ups\Entity\TrackResponse\EstimatedDeparture $estimatedDeparture
     * @return $this
     */
    public function setEstimatedDeparture($estimatedDeparture)
    {
        $this->estimatedDeparture = $estimatedDeparture;
        return $this;
    }

    /**
     * @return \Ups\Entity\TrackResponse\EstimatedDeparture
     */
    public function getEstimatedDeparture()
    {
        return $this->estimatedDeparture;
    }

}
