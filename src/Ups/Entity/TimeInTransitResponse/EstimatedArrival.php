<?php
namespace Ups\Entity\TimeInTransitResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  EstimatedArrival implements NodeInterface
{
    /**
     * @var string
     */
    private $dayOfWeek;

    /**
     * @var string
     */
    private $time;

    /**
     * @var string
     */
    private $date;

    /**
     * @var string
     */
    private $pickupDate;

    /**
     * @var string
     */
    private $pickupTime;

    /**
     * @var string
     */
    private $businessTransitDays;

    /**
     * @var string
     */
    private $totalTransitDays;

    /**
     * @var string
     */
    private $customerCenterCutoff;

    /**
     * @var string
     */
    private $restDays;

    /**
     * @var string
     */
    private $holidayCount;

    /**
     * @var string
     */
    private $delayCount;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->DayOfWeek)) {
                $this->setDayOfWeek($attributes->DayOfWeek);
            }
            if (isset($attributes->Time)) {
                $this->setTime($attributes->Time);
            }
            if (isset($attributes->Date)) {
                $this->setDate($attributes->Date);
            }
            if (isset($attributes->PickupDate)) {
                $this->setPickupDate($attributes->PickupDate);
            }
            if (isset($attributes->PickupTime)) {
                $this->setPickupTime($attributes->PickupTime);
            }
            if (isset($attributes->BusinessTransitDays)) {
                $this->setBusinessTransitDays($attributes->BusinessTransitDays);
            }
            if (isset($attributes->TotalTransitDays)) {
                $this->setTotalTransitDays($attributes->TotalTransitDays);
            }
            if (isset($attributes->CustomerCenterCutoff)) {
                $this->setCustomerCenterCutoff($attributes->CustomerCenterCutoff);
            }
            if (isset($attributes->RestDays)) {
                $this->setRestDays($attributes->RestDays);
            }
            if (isset($attributes->HolidayCount)) {
                $this->setHolidayCount($attributes->HolidayCount);
            }
            if (isset($attributes->DelayCount)) {
                $this->setDelayCount($attributes->DelayCount);
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

        $node = $document->createElement('EstimatedArrival');
        $node->appendChild($document->createElement('DayOfWeek', $this->getDayOfWeek()));
        $node->appendChild($document->createElement('Time', $this->getTime()));
        $node->appendChild($document->createElement('Date', $this->getDate()));
        $node->appendChild($document->createElement('PickupDate', $this->getPickupDate()));
        $node->appendChild($document->createElement('PickupTime', $this->getPickupTime()));
        $node->appendChild($document->createElement('BusinessTransitDays', $this->getBusinessTransitDays()));
        if (null !== $this->getTotalTransitDays()) {
            $node->appendChild($document->createElement('TotalTransitDays', $this->getTotalTransitDays()));
        }
        if (null !== $this->getCustomerCenterCutoff()) {
            $node->appendChild($document->createElement('CustomerCenterCutoff', $this->getCustomerCenterCutoff()));
        }
        if (null !== $this->getRestDays()) {
            $node->appendChild($document->createElement('RestDays', $this->getRestDays()));
        }
        if (null !== $this->getHolidayCount()) {
            $node->appendChild($document->createElement('HolidayCount', $this->getHolidayCount()));
        }
        if (null !== $this->getDelayCount()) {
            $node->appendChild($document->createElement('DelayCount', $this->getDelayCount()));
        }
        return $node;
    }

    /**
     * @param string $dayOfWeek
     * @return $this
     */
    public function setDayOfWeek($dayOfWeek)
    {
        $this->dayOfWeek = $dayOfWeek;
        return $this;
    }

    /**
     * @return string
     */
    public function getDayOfWeek()
    {
        return $this->dayOfWeek;
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
     * @param string $pickupDate
     * @return $this
     */
    public function setPickupDate($pickupDate)
    {
        $this->pickupDate = $pickupDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getPickupDate()
    {
        return $this->pickupDate;
    }

    /**
     * @param string $pickupTime
     * @return $this
     */
    public function setPickupTime($pickupTime)
    {
        $this->pickupTime = $pickupTime;
        return $this;
    }

    /**
     * @return string
     */
    public function getPickupTime()
    {
        return $this->pickupTime;
    }

    /**
     * @param string $businessTransitDays
     * @return $this
     */
    public function setBusinessTransitDays($businessTransitDays)
    {
        $this->businessTransitDays = $businessTransitDays;
        return $this;
    }

    /**
     * @return string
     */
    public function getBusinessTransitDays()
    {
        return $this->businessTransitDays;
    }

    /**
     * @param string $totalTransitDays
     * @return $this
     */
    public function setTotalTransitDays($totalTransitDays)
    {
        $this->totalTransitDays = $totalTransitDays;
        return $this;
    }

    /**
     * @return string
     */
    public function getTotalTransitDays()
    {
        return $this->totalTransitDays;
    }

    /**
     * @param string $customerCenterCutoff
     * @return $this
     */
    public function setCustomerCenterCutoff($customerCenterCutoff)
    {
        $this->customerCenterCutoff = $customerCenterCutoff;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerCenterCutoff()
    {
        return $this->customerCenterCutoff;
    }

    /**
     * @param string $restDays
     * @return $this
     */
    public function setRestDays($restDays)
    {
        $this->restDays = $restDays;
        return $this;
    }

    /**
     * @return string
     */
    public function getRestDays()
    {
        return $this->restDays;
    }

    /**
     * @param string $holidayCount
     * @return $this
     */
    public function setHolidayCount($holidayCount)
    {
        $this->holidayCount = $holidayCount;
        return $this;
    }

    /**
     * @return string
     */
    public function getHolidayCount()
    {
        return $this->holidayCount;
    }

    /**
     * @param string $delayCount
     * @return $this
     */
    public function setDelayCount($delayCount)
    {
        $this->delayCount = $delayCount;
        return $this;
    }

    /**
     * @return string
     */
    public function getDelayCount()
    {
        return $this->delayCount;
    }

}
