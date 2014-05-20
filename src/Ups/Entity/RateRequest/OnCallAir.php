<?php
namespace Ups\Entity\RateRequest;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  OnCallAir implements NodeInterface
{
    /**
     * @var \Ups\Entity\RateRequest\Schedule
     */
    private $schedule;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->Schedule)) {
                $this->setSchedule(new Schedule($attributes->Schedule));
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

        $node = $document->createElement('OnCallAir');
        if (null !== $this->getSchedule()) {
            $node->appendChild($this->getSchedule()->toNode($document));
        }
        return $node;
    }

    /**
     * @param \Ups\Entity\RateRequest\Schedule $schedule
     * @return $this
     */
    public function setSchedule($schedule)
    {
        $this->schedule = $schedule;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateRequest\Schedule
     */
    public function getSchedule()
    {
        return $this->schedule;
    }

}
