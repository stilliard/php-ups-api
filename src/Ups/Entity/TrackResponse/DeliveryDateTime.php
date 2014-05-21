<?php
namespace Ups\Entity\TrackResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  DeliveryDateTime implements NodeInterface
{
    /**
     * @var \Ups\Entity\TrackResponse\Type
     */
    private $type;

    /**
     * @var string
     */
    private $date;

    /**
     * @var string
     */
    private $time;

    function __construct($attributes = null)
    {
        $this->setType(new Type());

        if (null !== $attributes) {
            if (isset($attributes->Type)) {
                $this->setType(new Type($attributes->Type));
            }
            if (isset($attributes->Date)) {
                $this->setDate($attributes->Date);
            }
            if (isset($attributes->Time)) {
                $this->setTime($attributes->Time);
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

        $node = $document->createElement('DeliveryDateTime');
        $node->appendChild($this->getType()->toNode($document));
        $node->appendChild($document->createElement('Date', $this->getDate()));
        if (null !== $this->getTime()) {
            $node->appendChild($document->createElement('Time', $this->getTime()));
        }
        return $node;
    }

    /**
     * @param \Ups\Entity\TrackResponse\Type $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return \Ups\Entity\TrackResponse\Type
     */
    public function getType()
    {
        return $this->type;
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

}
