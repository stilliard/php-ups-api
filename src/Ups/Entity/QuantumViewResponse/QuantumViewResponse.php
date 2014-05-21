<?php
namespace Ups\Entity\QuantumViewResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  QuantumViewResponse implements NodeInterface
{
    /**
     * @var \Ups\Entity\QuantumViewResponse\Response
     */
    private $response;

    /**
     * @var \Ups\Entity\QuantumViewResponse\QuantumViewEvents
     */
    private $quantumViewEvents;

    /**
     * @var string
     */
    private $bookmark;

    function __construct($attributes = null)
    {
        $this->setResponse(new Response());

        if (null !== $attributes) {
            if (isset($attributes->Response)) {
                $this->setResponse(new Response($attributes->Response));
            }
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
        $node->appendChild($this->getResponse()->toNode($document));
        if (null !== $this->getQuantumViewEvents()) {
            $node->appendChild($this->getQuantumViewEvents()->toNode($document));
        }
        if (null !== $this->getBookmark()) {
            $node->appendChild($document->createElement('Bookmark', $this->getBookmark()));
        }
        return $node;
    }

    /**
     * @param \Ups\Entity\QuantumViewResponse\Response $response
     * @return $this
     */
    public function setResponse($response)
    {
        $this->response = $response;
        return $this;
    }

    /**
     * @return \Ups\Entity\QuantumViewResponse\Response
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param \Ups\Entity\QuantumViewResponse\QuantumViewEvents $quantumViewEvents
     * @return $this
     */
    public function setQuantumViewEvents($quantumViewEvents)
    {
        $this->quantumViewEvents = $quantumViewEvents;
        return $this;
    }

    /**
     * @return \Ups\Entity\QuantumViewResponse\QuantumViewEvents
     */
    public function getQuantumViewEvents()
    {
        return $this->quantumViewEvents;
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

}
