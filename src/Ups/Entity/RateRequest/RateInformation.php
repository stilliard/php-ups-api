<?php
namespace Ups\Entity\RateRequest;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  RateInformation implements NodeInterface
{
    /**
     * @var string
     */
    private $negotiatedRatesIndicator;

    /**
     * @var string
     */
    private $rateChartIndicator;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->NegotiatedRatesIndicator)) {
                $this->setNegotiatedRatesIndicator($attributes->NegotiatedRatesIndicator);
            }
            if (isset($attributes->RateChartIndicator)) {
                $this->setRateChartIndicator($attributes->RateChartIndicator);
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

        $node = $document->createElement('RateInformation');
        if (null !== $this->getNegotiatedRatesIndicator()) {
            $node->appendChild($document->createElement('NegotiatedRatesIndicator', $this->getNegotiatedRatesIndicator()));
        }
        if (null !== $this->getRateChartIndicator()) {
            $node->appendChild($document->createElement('RateChartIndicator', $this->getRateChartIndicator()));
        }
        return $node;
    }

    /**
     * @param string $negotiatedRatesIndicator
     * @return $this
     */
    public function setNegotiatedRatesIndicator($negotiatedRatesIndicator)
    {
        $this->negotiatedRatesIndicator = $negotiatedRatesIndicator;
        return $this;
    }

    /**
     * @return string
     */
    public function getNegotiatedRatesIndicator()
    {
        return $this->negotiatedRatesIndicator;
    }

    /**
     * @param string $rateChartIndicator
     * @return $this
     */
    public function setRateChartIndicator($rateChartIndicator)
    {
        $this->rateChartIndicator = $rateChartIndicator;
        return $this;
    }

    /**
     * @return string
     */
    public function getRateChartIndicator()
    {
        return $this->rateChartIndicator;
    }

}
