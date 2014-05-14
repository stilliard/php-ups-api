<?php
namespace Ups\Entity;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class ServiceSummary implements NodeInterface
{
    /**
     * @var \Ups\Entity\Service
     */
    private $service;

    /**
     * @var \Ups\Entity\Guaranteed
     */
    private $guaranteed;

    /**
     * @var \Ups\Entity\EstimatedArrival
     */
    private $estimatedArrival;

    /**
     * @var string
     */
    private $saturdayDelivery;

    /**
     * @var string
     */
    private $saturdayDeliveryDisclaimer;

    function __construct($attributes = null)
    {
        $this->setService(new Service());
        $this->setGuaranteed(new Guaranteed());
        $this->setEstimatedArrival(new EstimatedArrival());

        if (null !== $attributes) {
            if (isset($attributes->Service)) {
                $this->setService(new Service($attributes->Service));
            }
            if (isset($attributes->Guaranteed)) {
                $this->setGuaranteed(new Guaranteed($attributes->Guaranteed));
            }
            if (isset($attributes->EstimatedArrival)) {
                $this->setEstimatedArrival(new EstimatedArrival($attributes->EstimatedArrival));
            }
            if (isset($attributes->SaturdayDelivery)) {
                $this->setSaturdayDelivery($attributes->SaturdayDelivery);
            }
            if (isset($attributes->SaturdayDeliveryDisclaimer)) {
                $this->setSaturdayDeliveryDisclaimer($attributes->SaturdayDeliveryDisclaimer);
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

        $node = $document->createElement('ServiceSummary');
        $node->appendChild($this->getService()->toNode($document));
        $node->appendChild($this->getGuaranteed()->toNode($document));
        $node->appendChild($this->getEstimatedArrival()->toNode($document));
        $node->appendChild($document->createElement('SaturdayDelivery', $this->getSaturdayDelivery()));
        $node->appendChild($document->createElement('setSaturdayDeliveryDisclaimer', $this->getSaturdayDeliveryDisclaimer()));
        return $node;    }

    /**
     * @param \Ups\Entity\EstimatedArrival $estimatedArrival
     * @return $this
     */
    public function setEstimatedArrival($estimatedArrival)
    {
        $this->estimatedArrival = $estimatedArrival;
        return $this;
    }

    /**
     * @return \Ups\Entity\EstimatedArrival
     */
    public function getEstimatedArrival()
    {
        return $this->estimatedArrival;
    }

    /**
     * @param \Ups\Entity\Guaranteed $guaranteed
     * @return $this
     */
    public function setGuaranteed($guaranteed)
    {
        $this->guaranteed = $guaranteed;
        return $this;
    }

    /**
     * @return \Ups\Entity\Guaranteed
     */
    public function getGuaranteed()
    {
        return $this->guaranteed;
    }

    /**
     * @param string $saturdayDelivery
     * @return $this
     */
    public function setSaturdayDelivery($saturdayDelivery)
    {
        $this->saturdayDelivery = $saturdayDelivery;
        return $this;
    }

    /**
     * @return string
     */
    public function getSaturdayDelivery()
    {
        return $this->saturdayDelivery;
    }

    /**
     * @param string $saturdayDeliveryDisclaimer
     * @return $this
     */
    public function setSaturdayDeliveryDisclaimer($saturdayDeliveryDisclaimer)
    {
        $this->saturdayDeliveryDisclaimer = $saturdayDeliveryDisclaimer;
        return $this;
    }

    /**
     * @return string
     */
    public function getSaturdayDeliveryDisclaimer()
    {
        return $this->saturdayDeliveryDisclaimer;
    }

    /**
     * @param \Ups\Entity\Service $service
     * @return $this
     */
    public function setService($service)
    {
        $this->service = $service;
        return $this;
    }

    /**
     * @return \Ups\Entity\Service
     */
    public function getService()
    {
        return $this->service;
    }

}
