<?php
namespace Ups\Entity\TrackResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  Appointment implements NodeInterface
{
    /**
     * @var \Ups\Entity\TrackResponse\Made
     */
    private $made;

    /**
     * @var \Ups\Entity\TrackResponse\Requested
     */
    private $requested;

    /**
     * @var string
     */
    private $beginTime;

    /**
     * @var string
     */
    private $endTime;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->Made)) {
                $this->setMade(new Made($attributes->Made));
            }
            if (isset($attributes->Requested)) {
                $this->setRequested(new Requested($attributes->Requested));
            }
            if (isset($attributes->BeginTime)) {
                $this->setBeginTime($attributes->BeginTime);
            }
            if (isset($attributes->EndTime)) {
                $this->setEndTime($attributes->EndTime);
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

        $node = $document->createElement('Appointment');
        if (null !== $this->getMade()) {
            $node->appendChild($this->getMade()->toNode($document));
        }
        if (null !== $this->getRequested()) {
            $node->appendChild($this->getRequested()->toNode($document));
        }
        if (null !== $this->getBeginTime()) {
            $node->appendChild($document->createElement('BeginTime', $this->getBeginTime()));
        }
        if (null !== $this->getEndTime()) {
            $node->appendChild($document->createElement('EndTime', $this->getEndTime()));
        }
        return $node;
    }

    /**
     * @param \Ups\Entity\TrackResponse\Made $made
     * @return $this
     */
    public function setMade($made)
    {
        $this->made = $made;
        return $this;
    }

    /**
     * @return \Ups\Entity\TrackResponse\Made
     */
    public function getMade()
    {
        return $this->made;
    }

    /**
     * @param \Ups\Entity\TrackResponse\Requested $requested
     * @return $this
     */
    public function setRequested($requested)
    {
        $this->requested = $requested;
        return $this;
    }

    /**
     * @return \Ups\Entity\TrackResponse\Requested
     */
    public function getRequested()
    {
        return $this->requested;
    }

    /**
     * @param string $beginTime
     * @return $this
     */
    public function setBeginTime($beginTime)
    {
        $this->beginTime = $beginTime;
        return $this;
    }

    /**
     * @return string
     */
    public function getBeginTime()
    {
        return $this->beginTime;
    }

    /**
     * @param string $endTime
     * @return $this
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;
        return $this;
    }

    /**
     * @return string
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

}
