<?php
namespace Ups\Entity\TrackResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  Activity implements NodeInterface
{
    /**
     * @var array
     */
    private $alternateTrackingInfo;

    /**
     * @var \Ups\Entity\TrackResponse\ActivityLocation
     */
    private $activityLocation;

    /**
     * @var \Ups\Entity\TrackResponse\Status
     */
    private $status;

    /**
     * @var string
     */
    private $date;

    /**
     * @var string
     */
    private $time;

    /**
     * @var \Ups\Entity\TrackResponse\NextScheduleActivity
     */
    private $nextScheduleActivity;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->AlternateTrackingInfo)) {
                $alternateTrackingInfo = $this->getAlternateTrackingInfo();
                foreach ($attributes->AlternateTrackingInfo as $item) {
                    $alternateTrackingInfo[] = new AlternateTrackingInfo($item);
                }
                $this->setAlternateTrackingInfo($alternateTrackingInfo);
            }
            if (isset($attributes->ActivityLocation)) {
                $this->setActivityLocation(new ActivityLocation($attributes->ActivityLocation));
            }
            if (isset($attributes->Status)) {
                $this->setStatus(new Status($attributes->Status));
            }
            if (isset($attributes->Date)) {
                $this->setDate($attributes->Date);
            }
            if (isset($attributes->Time)) {
                $this->setTime($attributes->Time);
            }
            if (isset($attributes->NextScheduleActivity)) {
                $this->setNextScheduleActivity(new NextScheduleActivity($attributes->NextScheduleActivity));
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

        $node = $document->createElement('Activity');
        if (null !== $this->getAlternateTrackingInfo()) {
            if (count($this->getAlternateTrackingInfo()) > 0) {
                foreach ($this->getAlternateTrackingInfo() as $AlternateTrackingInfo) {
                    $node->appendChild($AlternateTrackingInfo->toNode($document));
                }
            }
        }
        if (null !== $this->getActivityLocation()) {
            $node->appendChild($this->getActivityLocation()->toNode($document));
        }
        if (null !== $this->getStatus()) {
            $node->appendChild($this->getStatus()->toNode($document));
        }
        if (null !== $this->getDate()) {
            $node->appendChild($document->createElement('Date', $this->getDate()));
        }
        if (null !== $this->getTime()) {
            $node->appendChild($document->createElement('Time', $this->getTime()));
        }
        if (null !== $this->getNextScheduleActivity()) {
            $node->appendChild($this->getNextScheduleActivity()->toNode($document));
        }
        return $node;
    }

    /**
     * @param array $alternateTrackingInfo
     * @return $this
     */
    public function setAlternateTrackingInfo($alternateTrackingInfo)
    {
        $this->alternateTrackingInfo = $alternateTrackingInfo;
        return $this;
    }

    /**
     * @return array
     */
    public function getAlternateTrackingInfo()
    {
        return $this->alternateTrackingInfo;
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
     * @param \Ups\Entity\TrackResponse\Status $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return \Ups\Entity\TrackResponse\Status
     */
    public function getStatus()
    {
        return $this->status;
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
     * @param \Ups\Entity\TrackResponse\NextScheduleActivity $nextScheduleActivity
     * @return $this
     */
    public function setNextScheduleActivity($nextScheduleActivity)
    {
        $this->nextScheduleActivity = $nextScheduleActivity;
        return $this;
    }

    /**
     * @return \Ups\Entity\TrackResponse\NextScheduleActivity
     */
    public function getNextScheduleActivity()
    {
        return $this->nextScheduleActivity;
    }

}
