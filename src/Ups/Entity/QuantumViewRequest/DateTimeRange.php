<?php
namespace Ups\Entity\QuantumViewRequest;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  DateTimeRange implements NodeInterface
{
    /**
     * @var string
     */
    private $beginDateTime;

    /**
     * @var string
     */
    private $endDateTime;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->BeginDateTime)) {
                $this->setBeginDateTime($attributes->BeginDateTime);
            }
            if (isset($attributes->EndDateTime)) {
                $this->setEndDateTime($attributes->EndDateTime);
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

        $node = $document->createElement('DateTimeRange');
        $node->appendChild($document->createElement('BeginDateTime', $this->getBeginDateTime()));
        if (null !== $this->getEndDateTime()) {
            $node->appendChild($document->createElement('EndDateTime', $this->getEndDateTime()));
        }
        return $node;
    }

    /**
     * @param string $beginDateTime
     * @return $this
     */
    public function setBeginDateTime($beginDateTime)
    {
        $this->beginDateTime = $beginDateTime;
        return $this;
    }

    /**
     * @return string
     */
    public function getBeginDateTime()
    {
        return $this->beginDateTime;
    }

    /**
     * @param string $endDateTime
     * @return $this
     */
    public function setEndDateTime($endDateTime)
    {
        $this->endDateTime = $endDateTime;
        return $this;
    }

    /**
     * @return string
     */
    public function getEndDateTime()
    {
        return $this->endDateTime;
    }

}
