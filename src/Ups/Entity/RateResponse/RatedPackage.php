<?php
namespace Ups\Entity\RateResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  RatedPackage implements NodeInterface
{
    /**
     * @var \Ups\Entity\RateResponse\TransportationCharges
     */
    private $transportationCharges;

    /**
     * @var \Ups\Entity\RateResponse\ServiceOptionsCharges
     */
    private $serviceOptionsCharges;

    /**
     * @var \Ups\Entity\RateResponse\TotalCharges
     */
    private $totalCharges;

    /**
     * @var string
     */
    private $weight;

    /**
     * @var \Ups\Entity\RateResponse\BillingWeight
     */
    private $billingWeight;

    /**
     * @var array
     */
    private $accessorial;

    function __construct($attributes = null)
    {
        $this->setTotalCharges(new TotalCharges());

        if (null !== $attributes) {
            if (isset($attributes->TransportationCharges)) {
                $this->setTransportationCharges(new TransportationCharges($attributes->TransportationCharges));
            }
            if (isset($attributes->ServiceOptionsCharges)) {
                $this->setServiceOptionsCharges(new ServiceOptionsCharges($attributes->ServiceOptionsCharges));
            }
            if (isset($attributes->TotalCharges)) {
                $this->setTotalCharges(new TotalCharges($attributes->TotalCharges));
            }
            if (isset($attributes->Weight)) {
                $this->setWeight($attributes->Weight);
            }
            if (isset($attributes->BillingWeight)) {
                $this->setBillingWeight(new BillingWeight($attributes->BillingWeight));
            }
            if (isset($attributes->Accessorial)) {
                $accessorial = $this->getAccessorial();
                foreach ($attributes->Accessorial as $item) {
                    $accessorial[] = new Accessorial($item);
                }
                $this->setAccessorial($accessorial);
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
        if (null !== $this->getTransportationCharges()) {
            $node->appendChild($this->getTransportationCharges()->toNode($document));
        }
        if (null !== $this->getServiceOptionsCharges()) {
            $node->appendChild($this->getServiceOptionsCharges()->toNode($document));
        }
        $node->appendChild($this->getTotalCharges()->toNode($document));
        if (null !== $this->getWeight()) {
            $node->appendChild($document->createElement('Weight', $this->getWeight()));
        }
        if (null !== $this->getBillingWeight()) {
            $node->appendChild($this->getBillingWeight()->toNode($document));
        }
        if (null !== $this->getAccessorial()) {
            if (count($this->getAccessorial()) > 0) {
                foreach ($this->getAccessorial() as $Accessorial) {
                    $node->appendChild($Accessorial->toNode($document));
                }
            }
        }
        return $node;
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
     * @param \Ups\Entity\RateResponse\ServiceOptionsCharges $serviceOptionsCharges
     * @return $this
     */
    public function setServiceOptionsCharges($serviceOptionsCharges)
    {
        $this->serviceOptionsCharges = $serviceOptionsCharges;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateResponse\ServiceOptionsCharges
     */
    public function getServiceOptionsCharges()
    {
        return $this->serviceOptionsCharges;
    }

    /**
     * @param \Ups\Entity\RateResponse\TotalCharges $totalCharges
     * @return $this
     */
    public function setTotalCharges($totalCharges)
    {
        $this->totalCharges = $totalCharges;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateResponse\TotalCharges
     */
    public function getTotalCharges()
    {
        return $this->totalCharges;
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

    /**
     * @param \Ups\Entity\RateResponse\BillingWeight $billingWeight
     * @return $this
     */
    public function setBillingWeight($billingWeight)
    {
        $this->billingWeight = $billingWeight;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateResponse\BillingWeight
     */
    public function getBillingWeight()
    {
        return $this->billingWeight;
    }

    /**
     * @param array $accessorial
     * @return $this
     */
    public function setAccessorial($accessorial)
    {
        $this->accessorial = $accessorial;
        return $this;
    }

    /**
     * @return array
     */
    public function getAccessorial()
    {
        return $this->accessorial;
    }

}
