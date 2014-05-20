<?php
namespace Ups\Entity\RateResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  NegotiatedRates implements NodeInterface
{
    /**
     * @var array
     */
    private $accessorialCharges;

    /**
     * @var array
     */
    private $surCharges;

    /**
     * @var \Ups\Entity\RateResponse\TransportationCharges
     */
    private $transportationCharges;

    /**
     * @var \Ups\Entity\RateResponse\NetSummaryCharges
     */
    private $netSummaryCharges;

    function __construct($attributes = null)
    {
        $this->setNetSummaryCharges(new NetSummaryCharges());

        if (null !== $attributes) {
            if (isset($attributes->AccessorialCharges)) {
                $accessorialCharges = $this->getAccessorialCharges();
                foreach ($attributes->AccessorialCharges as $item) {
                    $accessorialCharges[] = new AccessorialCharges($item);
                }
                $this->setAccessorialCharges($accessorialCharges);
            }
            if (isset($attributes->SurCharges)) {
                $surCharges = $this->getSurCharges();
                foreach ($attributes->SurCharges as $item) {
                    $surCharges[] = new SurCharges($item);
                }
                $this->setSurCharges($surCharges);
            }
            if (isset($attributes->TransportationCharges)) {
                $this->setTransportationCharges(new TransportationCharges($attributes->TransportationCharges));
            }
            if (isset($attributes->NetSummaryCharges)) {
                $this->setNetSummaryCharges(new NetSummaryCharges($attributes->NetSummaryCharges));
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

        $node = $document->createElement('NegotiatedRates');
        if (null !== $this->getAccessorialCharges()) {
            if (count($this->getAccessorialCharges()) > 0) {
                foreach ($this->getAccessorialCharges() as $AccessorialCharges) {
                    $node->appendChild($AccessorialCharges->toNode($document));
                }
            }
        }
        if (null !== $this->getSurCharges()) {
            if (count($this->getSurCharges()) > 0) {
                foreach ($this->getSurCharges() as $SurCharges) {
                    $node->appendChild($SurCharges->toNode($document));
                }
            }
        }
        if (null !== $this->getTransportationCharges()) {
            $node->appendChild($this->getTransportationCharges()->toNode($document));
        }
        $node->appendChild($this->getNetSummaryCharges()->toNode($document));
        return $node;
    }

    /**
     * @param array $accessorialCharges
     * @return $this
     */
    public function setAccessorialCharges($accessorialCharges)
    {
        $this->accessorialCharges = $accessorialCharges;
        return $this;
    }

    /**
     * @return array
     */
    public function getAccessorialCharges()
    {
        return $this->accessorialCharges;
    }

    /**
     * @param array $surCharges
     * @return $this
     */
    public function setSurCharges($surCharges)
    {
        $this->surCharges = $surCharges;
        return $this;
    }

    /**
     * @return array
     */
    public function getSurCharges()
    {
        return $this->surCharges;
    }

    /**
     * @param \Ups\Entity\RateResponse\TransportationCharges $transportationCharges
     * @return $this
     */
    public function setTransportationCharges($transportationCharges)
    {
        $this->transportationCharges = $transportationCharges;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateResponse\TransportationCharges
     */
    public function getTransportationCharges()
    {
        return $this->transportationCharges;
    }

    /**
     * @param \Ups\Entity\RateResponse\NetSummaryCharges $netSummaryCharges
     * @return $this
     */
    public function setNetSummaryCharges($netSummaryCharges)
    {
        $this->netSummaryCharges = $netSummaryCharges;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateResponse\NetSummaryCharges
     */
    public function getNetSummaryCharges()
    {
        return $this->netSummaryCharges;
    }

}
