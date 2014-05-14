<?php
namespace Ups\Entity;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class RatedPackage implements NodeInterface
{
    /**
     * @var string
     */
    private $weight;

    /**
     * @var \Ups\Entity\BillingWeight
     */
    private $billingWeight;

    /**
     * @var \Ups\Entity\TransportationCharges
     */
    private $transportationCharges;

    /**
     * @var \Ups\Entity\ServiceOptionsCharges
     */
    private $serviceOptionsCharges;

    /**
     * @var \Ups\Entity\TotalCharges
     */
    private $totalCharges;

    function __construct($attributes = null)
    {
        $this->BillingWeight = new BillingWeight();
        $this->TransportationCharges = new TransportationCharges();
        $this->ServiceOptionsCharges = new ServiceOptionsCharges();
        $this->TotalCharges = new TotalCharges();
        $this->Weight = '0.0';

        if (null !== $attributes) {
            if (isset($attributes->Weight)) {
                $this->setWeight($attributes->Weight);
            }
            if (isset($attributes->BillingWeight)) {
                $this->setBillingWeight(new BillingWeight($attributes->BillingWeight));
            }
            if (isset($attributes->TransportationCharges)) {
                $this->setTransportationCharges(new TransportationCharges($attributes->TransportationCharges));
            }
            if (isset($attributes->ServiceOptionsCharges)) {
                $this->setServiceOptionsCharges(new ServiceOptionsCharges($attributes->ServiceOptionsCharges));
            }
            if (isset($attributes->TotalCharges)) {
                $this->setTotalCharges(new TotalCharges($attributes->TotalCharges));
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

        $node = $document->createElement('RatedPackage');
        $node->appendChild($this->getBillingWeight()->toNode($document));
        $node->appendChild($this->getTransportationCharges()->toNode($document));
        $node->appendChild($this->getServiceOptionsCharges()->toNode($document));
        $node->appendChild($this->getTotalCharges()->toNode($document));
        $node->appendChild($document->createElement('Weight', $this->getWeight()));
        return $node;
    }

    /**
     * @param \Ups\Entity\BillingWeight $billingWeight
     * @return $this
     */
    public function setBillingWeight($billingWeight)
    {
        $this->billingWeight = $billingWeight;
        return $this;
    }

    /**
     * @return \Ups\Entity\BillingWeight
     */
    public function getBillingWeight()
    {
        return $this->billingWeight;
    }

    /**
     * @param \Ups\Entity\ServiceOptionsCharges $serviceOptionsCharges
     * @return $this
     */
    public function setServiceOptionsCharges($serviceOptionsCharges)
    {
        $this->serviceOptionsCharges = $serviceOptionsCharges;
        return $this;
    }

    /**
     * @return \Ups\Entity\ServiceOptionsCharges
     */
    public function getServiceOptionsCharges()
    {
        return $this->serviceOptionsCharges;
    }

    /**
     * @param \Ups\Entity\TotalCharges $totalCharges
     * @return $this
     */
    public function setTotalCharges($totalCharges)
    {
        $this->totalCharges = $totalCharges;
        return $this;
    }

    /**
     * @return \Ups\Entity\TotalCharges
     */
    public function getTotalCharges()
    {
        return $this->totalCharges;
    }

    /**
     * @param \Ups\Entity\TransportationCharges $transportationCharges
     * @return $this
     */
    public function setTransportationCharges($transportationCharges)
    {
        $this->transportationCharges = $transportationCharges;
        return $this;
    }

    /**
     * @return \Ups\Entity\TransportationCharges
     */
    public function getTransportationCharges()
    {
        return $this->transportationCharges;
    }

    /**
     * @param string $weight
     * @return $this
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * @return string
     */
    public function getWeight()
    {
        return $this->weight;
    }

}
