<?php
namespace Ups\Entity\RateResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  RatedShipment implements NodeInterface
{
    /**
     * @var \Ups\Entity\RateResponse\Service
     */
    private $service;

    /**
     * @var string
     */
    private $rateChart;

    /**
     * @var array
     */
    private $ratedShipmentWarning;

    /**
     * @var \Ups\Entity\RateResponse\BillingWeight
     */
    private $billingWeight;

    /**
     * @var \Ups\Entity\RateResponse\TransportationCharges
     */
    private $transportationCharges;

    /**
     * @var array
     */
    private $accessorialCharges;

    /**
     * @var array
     */
    private $surCharges;

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
     * @var \Ups\Entity\RateResponse\NegotiatedRates
     */
    private $negotiatedRates;

    function __construct($attributes = null)
    {
        $this->setService(new Service());
        $this->setBillingWeight(new BillingWeight());
        $this->setTransportationCharges(new TransportationCharges());
        $this->setServiceOptionsCharges(new ServiceOptionsCharges());
        $this->setTotalCharges(new TotalCharges());
        $this->setRatedPackage(array());

        if (null !== $attributes) {
            if (isset($attributes->Service)) {
                $this->setService(new Service($attributes->Service));
            }
            if (isset($attributes->RateChart)) {
                $this->setRateChart($attributes->RateChart);
            }
            if (isset($attributes->RatedShipmentWarning)) {
                $ratedShipmentWarning = $this->getRatedShipmentWarning();
                if (is_array($attributes->RatedShipmentWarning)) {
                    foreach ($attributes->RatedShipmentWarning as $item) {
                        $ratedShipmentWarning[] = $item;
                    }
                }
                else {
                    $ratedShipmentWarning[] = $attributes->RatedShipmentWarning;
                }
                $this->setRatedShipmentWarning($ratedShipmentWarning);
            }
            if (isset($attributes->BillingWeight)) {
                $this->setBillingWeight(new BillingWeight($attributes->BillingWeight));
            }
            if (isset($attributes->TransportationCharges)) {
                $this->setTransportationCharges(new TransportationCharges($attributes->TransportationCharges));
            }
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
            if (isset($attributes->ServiceOptionsCharges)) {
                $this->setServiceOptionsCharges(new ServiceOptionsCharges($attributes->ServiceOptionsCharges));
            }
            if (isset($attributes->TotalCharges)) {
                $this->setTotalCharges(new TotalCharges($attributes->TotalCharges));
            }
            if (isset($attributes->GuaranteedDaysToDelivery)) {
                $this->setGuaranteedDaysToDelivery($attributes->GuaranteedDaysToDelivery);
            }
            if (isset($attributes->ScheduledDeliveryTime)) {
                $this->setScheduledDeliveryTime($attributes->ScheduledDeliveryTime);
            }
            if (isset($attributes->RatedPackage)) {
                $ratedPackage = $this->getRatedPackage();
                foreach ($attributes->RatedPackage as $item) {
                    $ratedPackage[] = new RatedPackage($item);
                }
                $this->setRatedPackage($ratedPackage);
            }
            if (isset($attributes->NegotiatedRates)) {
                $this->setNegotiatedRates(new NegotiatedRates($attributes->NegotiatedRates));
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
        $node->appendChild($this->getService()->toNode($document));
        if (null !== $this->getRateChart()) {
            $node->appendChild($document->createElement('RateChart', $this->getRateChart()));
        }
        if (null !== $this->getRatedShipmentWarning()) {
            if (count($this->getRatedShipmentWarning()) > 0) {
                foreach ($this->getRatedShipmentWarning() as $RatedShipmentWarning) {
                    $node->appendChild($document->createElement('RatedShipmentWarning', $RatedShipmentWarning));
                }
            }
        }
        $node->appendChild($this->getBillingWeight()->toNode($document));
        $node->appendChild($this->getTransportationCharges()->toNode($document));
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
        $node->appendChild($this->getServiceOptionsCharges()->toNode($document));
        $node->appendChild($this->getTotalCharges()->toNode($document));
        $node->appendChild($document->createElement('GuaranteedDaysToDelivery', $this->getGuaranteedDaysToDelivery()));
        $node->appendChild($document->createElement('ScheduledDeliveryTime', $this->getScheduledDeliveryTime()));
        if (count($this->getRatedPackage()) > 0) {
            foreach ($this->getRatedPackage() as $RatedPackage) {
                $node->appendChild($RatedPackage->toNode($document));
            }
        }
        if (null !== $this->getNegotiatedRates()) {
            $node->appendChild($this->getNegotiatedRates()->toNode($document));
        }
        return $node;
    }

    /**
     * @param \Ups\Entity\RateResponse\Service $service
     * @return $this
     */
    public function setService($service)
    {
        $this->service = $service;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateResponse\Service
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param string $rateChart
     * @return $this
     */
    public function setRateChart($rateChart)
    {
        $this->rateChart = $rateChart;
        return $this;
    }

    /**
     * @return string
     */
    public function getRateChart()
    {
        return $this->rateChart;
    }

    /**
     * @param array $ratedShipmentWarning
     * @return $this
     */
    public function setRatedShipmentWarning($ratedShipmentWarning)
    {
        $this->ratedShipmentWarning = $ratedShipmentWarning;
        return $this;
    }

    /**
     * @return array
     */
    public function getRatedShipmentWarning()
    {
        return $this->ratedShipmentWarning;
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
     * @param \Ups\Entity\RateResponse\NegotiatedRates $negotiatedRates
     * @return $this
     */
    public function setNegotiatedRates($negotiatedRates)
    {
        $this->negotiatedRates = $negotiatedRates;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateResponse\NegotiatedRates
     */
    public function getNegotiatedRates()
    {
        return $this->negotiatedRates;
    }

}
