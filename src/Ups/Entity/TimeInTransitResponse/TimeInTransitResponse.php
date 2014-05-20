<?php
namespace Ups\Entity\TimeInTransitResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  TimeInTransitResponse implements NodeInterface
{
    /**
     * @var \Ups\Entity\TimeInTransitResponse\Response
     */
    private $response;

    /**
     * @var array
     */
    private $transitResponse;

    /**
     * @var \Ups\Entity\TimeInTransitResponse\TransitFromList
     */
    private $transitFromList;

    /**
     * @var \Ups\Entity\TimeInTransitResponse\TransitToList
     */
    private $transitToList;

    function __construct($attributes = null)
    {
        $this->setResponse(new Response());

        if (null !== $attributes) {
            if (isset($attributes->Response)) {
                $this->setResponse(new Response($attributes->Response));
            }
            if (isset($attributes->TransitResponse)) {
                $transitResponse = $this->getTransitResponse();
                foreach ($attributes->TransitResponse as $item) {
                    $transitResponse[] = new TransitResponse($item);
                }
                $this->setTransitResponse($transitResponse);
            }
            if (isset($attributes->TransitFromList)) {
                $this->setTransitFromList(new TransitFromList($attributes->TransitFromList));
            }
            if (isset($attributes->TransitToList)) {
                $this->setTransitToList(new TransitToList($attributes->TransitToList));
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

        $node = $document->createElement('TimeInTransitResponse');
        $node->appendChild($this->getResponse()->toNode($document));
        if (null !== $this->getTransitResponse()) {
            if (count($this->getTransitResponse()) > 0) {
                foreach ($this->getTransitResponse() as $TransitResponse) {
                    $node->appendChild($TransitResponse->toNode($document));
                }
            }
        }
        if (null !== $this->getTransitFromList()) {
            $node->appendChild($this->getTransitFromList()->toNode($document));
        }
        if (null !== $this->getTransitToList()) {
            $node->appendChild($this->getTransitToList()->toNode($document));
        }
        return $node;
    }

    /**
     * @param \Ups\Entity\TimeInTransitResponse\Response $response
     * @return $this
     */
    public function setResponse($response)
    {
        $this->response = $response;
        return $this;
    }

    /**
     * @return \Ups\Entity\TimeInTransitResponse\Response
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param array $transitResponse
     * @return $this
     */
    public function setTransitResponse($transitResponse)
    {
        $this->transitResponse = $transitResponse;
        return $this;
    }

    /**
     * @return array
     */
    public function getTransitResponse()
    {
        return $this->transitResponse;
    }

    /**
     * @param \Ups\Entity\TimeInTransitResponse\TransitFromList $transitFromList
     * @return $this
     */
    public function setTransitFromList($transitFromList)
    {
        $this->transitFromList = $transitFromList;
        return $this;
    }

    /**
     * @return \Ups\Entity\TimeInTransitResponse\TransitFromList
     */
    public function getTransitFromList()
    {
        return $this->transitFromList;
    }

    /**
     * @param \Ups\Entity\TimeInTransitResponse\TransitToList $transitToList
     * @return $this
     */
    public function setTransitToList($transitToList)
    {
        $this->transitToList = $transitToList;
        return $this;
    }

    /**
     * @return \Ups\Entity\TimeInTransitResponse\TransitToList
     */
    public function getTransitToList()
    {
        return $this->transitToList;
    }

}
