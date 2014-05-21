<?php
namespace Ups\Entity\TrackResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  EstimatedDeliveryDetails implements NodeInterface
{
    /**
     * @var string
     */
    private $date;

    /**
     * @var string
     */
    private $time;

    /**
     * @var \Ups\Entity\TrackResponse\ServiceCenter
     */
    private $serviceCenter;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->Date)) {
                $this->setDate($attributes->Date);
            }
            if (isset($attributes->Time)) {
                $this->setTime($attributes->Time);
            }
            if (isset($attributes->ServiceCenter)) {
                $this->setServiceCenter(new ServiceCenter($attributes->ServiceCenter));
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

        $node = $document->createElement('EstimatedDeliveryDetails');
        if (null !== $this->getDate()) {
            $node->appendChild($document->createElement('Date', $this->getDate()));
        }
        if (null !== $this->getTime()) {
            $node->appendChild($document->createElement('Time', $this->getTime()));
        }
        if (null !== $this->getServiceCenter()) {
            $node->appendChild($this->getServiceCenter()->toNode($document));
        }
        return $node;
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
     * @param \Ups\Entity\TrackResponse\ServiceCenter $serviceCenter
     * @return $this
     */
    public function setServiceCenter($serviceCenter)
    {
        $this->serviceCenter = $serviceCenter;
        return $this;
    }

    /**
     * @return \Ups\Entity\TrackResponse\ServiceCenter
     */
    public function getServiceCenter()
    {
        return $this->serviceCenter;
    }

}
