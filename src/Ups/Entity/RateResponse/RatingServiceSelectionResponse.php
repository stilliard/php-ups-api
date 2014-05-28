<?php
namespace Ups\Entity\RateResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  RatingServiceSelectionResponse implements NodeInterface
{
    /**
     * @var \Ups\Entity\RateResponse\Response
     */
    private $response;

    /**
     * @var array
     */
    private $ratedShipment;

    function __construct($attributes = null)
    {
        $this->setResponse(new Response());
        $this->setRatedShipment(array());

        if (null !== $attributes) {
            if (isset($attributes->Response)) {
                $this->setResponse(new Response($attributes->Response));
            }
            if (isset($attributes->RatedShipment)) {
                $ratedShipment = $this->getRatedShipment();
                if (is_array($attributes->RatedShipment)) {
                    foreach ($attributes->RatedShipment as $item) {
                        $ratedShipment[] = new RatedShipment($item);
                    }
                } else {
                    $ratedShipment[] = new RatedShipment($attributes->RatedShipment);
                }
                $this->setRatedShipment($ratedShipment);
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

        $node = $document->createElement('RatingServiceSelectionResponse');
        $node->appendChild($this->getResponse()->toNode($document));
        if (count($this->getRatedShipment()) > 0) {
            foreach ($this->getRatedShipment() as $RatedShipment) {
                $node->appendChild($RatedShipment->toNode($document));
            }
        }
        return $node;
    }

    /**
     * @param \Ups\Entity\RateResponse\Response $response
     * @return $this
     */
    public function setResponse($response)
    {
        $this->response = $response;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateResponse\Response
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param array $ratedShipment
     * @return $this
     */
    public function setRatedShipment($ratedShipment)
    {
        $this->ratedShipment = $ratedShipment;
        return $this;
    }

    /**
     * @return array
     */
    public function getRatedShipment()
    {
        return $this->ratedShipment;
    }

}
