<?php
namespace Ups\Entity\TimeInTransitResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  ServiceSummary implements NodeInterface
{
    /**
     * @var \Ups\Entity\TimeInTransitResponse\Service
     */
    private $service;

    /**
     * @var array
     */
    private $guaranteed;

    /**
     * @var string
     */
    private $disclaimer;

    /**
     * @var \Ups\Entity\TimeInTransitResponse\EstimatedArrival
     */
    private $estimatedArrival;

    function __construct($attributes = null)
    {
        $this->setService(new Service());
        $this->setEstimatedArrival(new EstimatedArrival());

        if (null !== $attributes) {
            if (isset($attributes->Service)) {
                $this->setService(new Service($attributes->Service));
            }
            if (isset($attributes->Guaranteed)) {
                $guaranteed = $this->getGuaranteed();
                foreach ($attributes->Guaranteed as $item) {
                    $guaranteed[] = new Guaranteed($item);
                }
                $this->setGuaranteed($guaranteed);
            }
            if (isset($attributes->Disclaimer)) {
                $this->setDisclaimer($attributes->Disclaimer);
            }
            if (isset($attributes->EstimatedArrival)) {
                $this->setEstimatedArrival(new EstimatedArrival($attributes->EstimatedArrival));
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
        if (null !== $this->getGuaranteed()) {
            if (count($this->getGuaranteed()) > 0) {
                foreach ($this->getGuaranteed() as $Guaranteed) {
                    $node->appendChild($Guaranteed->toNode($document));
                }
            }
        }
        if (null !== $this->getDisclaimer()) {
            $node->appendChild($document->createElement('Disclaimer', $this->getDisclaimer()));
        }
        $node->appendChild($this->getEstimatedArrival()->toNode($document));
        return $node;
    }

    /**
     * @param \Ups\Entity\TimeInTransitResponse\Service $service
     * @return $this
     */
    public function setService($service)
    {
        $this->service = $service;
        return $this;
    }

    /**
     * @return \Ups\Entity\TimeInTransitResponse\Service
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param array $guaranteed
     * @return $this
     */
    public function setGuaranteed($guaranteed)
    {
        $this->guaranteed = $guaranteed;
        return $this;
    }

    /**
     * @return array
     */
    public function getGuaranteed()
    {
        return $this->guaranteed;
    }

    /**
     * @param string $disclaimer
     * @return $this
     */
    public function setDisclaimer($disclaimer)
    {
        $this->disclaimer = $disclaimer;
        return $this;
    }

    /**
     * @return string
     */
    public function getDisclaimer()
    {
        return $this->disclaimer;
    }

    /**
     * @param \Ups\Entity\TimeInTransitResponse\EstimatedArrival $estimatedArrival
     * @return $this
     */
    public function setEstimatedArrival($estimatedArrival)
    {
        $this->estimatedArrival = $estimatedArrival;
        return $this;
    }

    /**
     * @return \Ups\Entity\TimeInTransitResponse\EstimatedArrival
     */
    public function getEstimatedArrival()
    {
        return $this->estimatedArrival;
    }

}
