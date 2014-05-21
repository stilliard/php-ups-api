<?php
namespace Ups\Entity\TrackResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  ShipmentActivity implements NodeInterface
{
    /**
     * @var \Ups\Entity\TrackResponse\ActivityLocation
     */
    private $activityLocation;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $date;

    /**
     * @var string
     */
    private $time;

    /**
     * @var string
     */
    private $trailer;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->ActivityLocation)) {
                $this->setActivityLocation(new ActivityLocation($attributes->ActivityLocation));
            }
            if (isset($attributes->Description)) {
                $this->setDescription($attributes->Description);
            }
            if (isset($attributes->Date)) {
                $this->setDate($attributes->Date);
            }
            if (isset($attributes->Time)) {
                $this->setTime($attributes->Time);
            }
            if (isset($attributes->Trailer)) {
                $this->setTrailer($attributes->Trailer);
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

        $node = $document->createElement('ShipmentActivity');
        if (null !== $this->getActivityLocation()) {
            $node->appendChild($this->getActivityLocation()->toNode($document));
        }
        if (null !== $this->getDescription()) {
            $node->appendChild($document->createElement('Description', $this->getDescription()));
        }
        if (null !== $this->getDate()) {
            $node->appendChild($document->createElement('Date', $this->getDate()));
        }
        if (null !== $this->getTime()) {
            $node->appendChild($document->createElement('Time', $this->getTime()));
        }
        if (null !== $this->getTrailer()) {
            $node->appendChild($document->createElement('Trailer', $this->getTrailer()));
        }
        return $node;
    }

    /**
     * @param \Ups\Entity\TrackResponse\ActivityLocation $activityLocation
     * @return $this
     */
    public function setActivityLocation($activityLocation)
    {
        $this->activityLocation = $activityLocation;
        return $this;
    }

    /**
     * @return \Ups\Entity\TrackResponse\ActivityLocation
     */
    public function getActivityLocation()
    {
        return $this->activityLocation;
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
     * @param string $date
     * @return $this
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param string $time
     * @return $this
     */
    public function setTime($time)
    {
        $this->time = $time;
        return $this;
    }

    /**
     * @return string
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param string $trailer
     * @return $this
     */
    public function setTrailer($trailer)
    {
        $this->trailer = $trailer;
        return $this;
    }

    /**
     * @return string
     */
    public function getTrailer()
    {
        return $this->trailer;
    }

}
