<?php
namespace Ups\Entity;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class QuantumViewResponse implements NodeInterface
{
    /**
     * @var \Ups\Entity\QuantumViewEvents
     */
    private $quantumViewEvents;

    /**
     * @var string
     */
    private $bookmark;

    function __construct($attributes = null)
    {
        if (null !== $attributes) {
            if (isset($attributes->QuantumViewEvents)) {
                $this->setQuantumViewEvents(new QuantumViewEvents($attributes->QuantumViewEvents));
            }
            if (isset($attributes->Bookmark)) {
                $this->setBookmark($attributes->Bookmark);
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

        $node = $document->createElement('QuantumViewResponse');
        $node->appendChild($this->getQuantumViewEvents()->toNode($document));
        $node->appendChild($document->createElement('Bookmark', $this->getBookmark()));
        return $node;
    }

    /**
     * @param string $bookmark
     * @return $this
     */
    public function setBookmark($bookmark)
    {
        $this->bookmark = $bookmark;
        return $this;
    }

    /**
     * @return string
     */
    public function getBookmark()
    {
        return $this->bookmark;
    }

    /**
     * @param \Ups\Entity\QuantumViewEvents $quantumViewEvents
     * @return $this
     */
    public function setQuantumViewEvents($quantumViewEvents)
    {
        $this->quantumViewEvents = $quantumViewEvents;
        return $this;
    }

    /**
     * @return \Ups\Entity\QuantumViewEvents
     */
    public function getQuantumViewEvents()
    {
        return $this->quantumViewEvents;
    }

}
