<?php
namespace Ups\Entity;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class RatedShipment implements NodeInterface
{
    /**
     * @var \Ups\Entity\Service
     */
    private $service;

    /**
     * @var string
     */
    private $ratedShipmentWarning;

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

    /**
     * @var string
     */
    private $guaranteedDaysToDelivery;

    /**
     * @var string
     */
    private $scheduledDeliveryTime;

    /**
     * @var array
     */
    private $ratedPackage;

    /**
     * @var array
     */
    private $surCharges;

    function __construct($attributes = null)
    {
        $this->setService(new Service());
        $this->setBillingWeight(new BillingWeight());
        $this->setTransportationCharges(new TransportationCharges());
        $this->setServiceOptionsCharges(new ServiceOptionsCharges());
        $this->setTotalCharges(new TotalCharges());
        $this->setRatedPackage(array());
        $this->setSurCharges(array());

        if (null !== $attributes) {
            if (isset($attributes->Service)) {
                $this->setService(new Service($attributes->Service));
            }
            if (isset($attributes->RatedShipmentWarning)) {
                $this->setRatedShipmentWarning($attributes->RatedShipmentWarning);
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
            if (isset($attributes->RatedPackage)) {
                $ratedPackage = $this->getRatedPackage();
                if (is_array($attributes->RatedPackage)) {
                    foreach ($attributes->RatedPackage as $item) {
                        $ratedPackage[] = new RatedPackage($item);
                    }
                } else {
                    $ratedPackage[] = new RatedPackage($attributes->RatedPackage);
                }
                $this->setRatedPackage($ratedPackage);
            }
            if (isset($attributes->SurCharges)) {
                $surCharges = $this->getSurCharges();
                if (is_array($attributes->SurCharges)) {
                    foreach ($attributes->SurCharges as $item) {
                        $surCharges[] = new SurCharges($item);
                    }
                } else {
                    $surCharges[] = new SurCharges($attributes->SurCharges);
                }
                $this->setSurCharges($surCharges);
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

        $node = $document->createElement('RatedShipment');
        $node->appendChild($document->createElement('RatedShipmentWarning', $this->getRatedShipmentWarning()));
        $node->appendChild($this->getService()->toNode($document));
        $node->appendChild($this->getBillingWeight()->toNode($document));
        $node->appendChild($this->getTransportationCharges()->toNode($document));
        $node->appendChild($this->getServiceOptionsCharges()->toNode($document));
        $node->appendChild($this->getTotalCharges()->toNode($document));
        if (count($this->getRatedPackage()) > 0) {
            foreach ($this->getRatedPackage() as $ratedPackage) {
                $node->appendChild($ratedPackage->toNode($document));
            }
        }
        if (count($this->getSurCharges()) > 0) {
            foreach ($this->getSurCharges() as $surCharges) {
                $node->appendChild($surCharges->toNode($document));
            }
        }
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
     * @param string $guaranteedDaysToDelivery
     * @return $this
     */
    public function setGuaranteedDaysToDelivery($guaranteedDaysToDelivery)
    {
        $this->guaranteedDaysToDelivery = $guaranteedDaysToDelivery;
        return $this;
    }

    /**
     * @return string
     */
    public function getGuaranteedDaysToDelivery()
    {
        return $this->guaranteedDaysToDelivery;
    }

    /**
     * @param string $ratedShipmentWarning
     * @return $this
     */
    public function setRatedShipmentWarning($ratedShipmentWarning)
    {
        $this->ratedShipmentWarning = $ratedShipmentWarning;
        return $this;
    }

    /**
     * @return string
     */
    public function getRatedShipmentWarning()
    {
        return $this->ratedShipmentWarning;
    }

    /**
     * @param array $ratedPackage
     * @return $this
     */
    public function setRatedPackage($ratedPackage)
    {
        $this->ratedPackage = $ratedPackage;
        return $this;
    }

    /**
     * @return array
     */
    public function getRatedPackage()
    {
        return $this->ratedPackage;
    }

    /**
     * @param string $scheduledDeliveryTime
     * @return $this
     */
    public function setScheduledDeliveryTime($scheduledDeliveryTime)
    {
        $this->scheduledDeliveryTime = $scheduledDeliveryTime;
        return $this;
    }

    /**
     * @return string
     */
    public function getScheduledDeliveryTime()
    {
        return $this->scheduledDeliveryTime;
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

}
