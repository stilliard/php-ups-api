<?php
namespace Ups\Entity\TrackResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  CarrierActivityInformation implements NodeInterface
{
    /**
     * @var string
     */
    private $carrierId;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $status;

    /**
     * @var \Ups\Entity\TrackResponse\Arrival
     */
    private $arrival;

    /**
     * @var \Ups\Entity\TrackResponse\Departure
     */
    private $departure;

    /**
     * @var string
     */
    private $originPort;

    /**
     * @var string
     */
    private $destinationPort;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->CarrierId)) {
                $this->setCarrierId($attributes->CarrierId);
            }
            if (isset($attributes->Description)) {
                $this->setDescription($attributes->Description);
            }
            if (isset($attributes->Status)) {
                $this->setStatus($attributes->Status);
            }
            if (isset($attributes->Arrival)) {
                $this->setArrival(new Arrival($attributes->Arrival));
            }
            if (isset($attributes->Departure)) {
                $this->setDeparture(new Departure($attributes->Departure));
            }
            if (isset($attributes->OriginPort)) {
                $this->setOriginPort($attributes->OriginPort);
            }
            if (isset($attributes->DestinationPort)) {
                $this->setDestinationPort($attributes->DestinationPort);
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

        $node = $document->createElement('CarrierActivityInformation');
        if (null !== $this->getCarrierId()) {
            $node->appendChild($document->createElement('CarrierId', $this->getCarrierId()));
        }
        if (null !== $this->getDescription()) {
            $node->appendChild($document->createElement('Description', $this->getDescription()));
        }
        if (null !== $this->getStatus()) {
            $node->appendChild($document->createElement('Status', $this->getStatus()));
        }
        if (null !== $this->getArrival()) {
            $node->appendChild($this->getArrival()->toNode($document));
        }
        if (null !== $this->getDeparture()) {
            $node->appendChild($this->getDeparture()->toNode($document));
        }
        if (null !== $this->getOriginPort()) {
            $node->appendChild($document->createElement('OriginPort', $this->getOriginPort()));
        }
        if (null !== $this->getDestinationPort()) {
            $node->appendChild($document->createElement('DestinationPort', $this->getDestinationPort()));
        }
        return $node;
    }

    /**
     * @param string $carrierId
     * @return $this
     */
    public function setCarrierId($carrierId)
    {
        $this->carrierId = $carrierId;
        return $this;
    }

    /**
     * @return string
     */
    public function getCarrierId()
    {
        return $this->carrierId;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param \Ups\Entity\TrackResponse\Arrival $arrival
     * @return $this
     */
    public function setArrival($arrival)
    {
        $this->arrival = $arrival;
        return $this;
    }

    /**
     * @return \Ups\Entity\TrackResponse\Arrival
     */
    public function getArrival()
    {
        return $this->arrival;
    }

    /**
     * @param \Ups\Entity\TrackResponse\Departure $departure
     * @return $this
     */
    public function setDeparture($departure)
    {
        $this->departure = $departure;
        return $this;
    }

    /**
     * @return \Ups\Entity\TrackResponse\Departure
     */
    public function getDeparture()
    {
        return $this->departure;
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

}
