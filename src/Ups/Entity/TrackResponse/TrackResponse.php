<?php
namespace Ups\Entity\TrackResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  TrackResponse implements NodeInterface
{
    /**
     * @var \Ups\Entity\TrackResponse\Response
     */
    private $response;

    /**
     * @var array
     */
    private $shipment;

    function __construct($attributes = null)
    {
        $this->setResponse(new Response());

        if (null !== $attributes) {
            if (isset($attributes->Response)) {
                $this->setResponse(new Response($attributes->Response));
            }
            if (isset($attributes->Shipment)) {
                $shipment = $this->getShipment();
                foreach ($attributes->Shipment as $item) {
                    $shipment[] = new Shipment($item);
                }
                $this->setShipment($shipment);
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

        $node = $document->createElement('TrackResponse');
        $node->appendChild($this->getResponse()->toNode($document));
        if (null !== $this->getShipment()) {
            if (count($this->getShipment()) > 0) {
                foreach ($this->getShipment() as $Shipment) {
                    $node->appendChild($Shipment->toNode($document));
                }
            }
        }
        return $node;
    }

    /**
     * @param \Ups\Entity\TrackResponse\Response $response
     * @return $this
     */
    public function setResponse($response)
    {
        $this->response = $response;
        return $this;
    }

    /**
     * @return \Ups\Entity\TrackResponse\Response
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param array $shipment
     * @return $this
     */
    public function setShipment($shipment)
    {
        $this->shipment = $shipment;
        return $this;
    }

    /**
     * @return array
     */
    public function getShipment()
    {
        return $this->shipment;
    }

}
