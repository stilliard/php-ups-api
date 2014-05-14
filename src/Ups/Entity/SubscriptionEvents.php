<?php
namespace Ups\Entity;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class SubscriptionEvents implements NodeInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $number;

    /**
     * @var \Ups\Entity\SubscriptionEvents
     */
    private $subscriptionStatus;

    /**
     * @var \Ups\Entity\DateRange
     */
    private $dateRange;

    function __construct($response = null)
    {
        $this->setSubscriptionStatus(new SubscriptionStatus());
        $this->setDateRange(new DateRange());

        if (null !== $response) {
            if (isset($response->Name)) {
                $this->setName($response->Name);
            }
            if (isset($response->Number)) {
                $this->setNumber($response->Number);
            }
            if (isset($response->SubscriptionStatus)) {
                $this->setSubscriptionStatus(new SubscriptionStatus($response->SubscriptionStatus));
            }
            if (isset($response->DateRange)) {
                $this->setDateRange(new DateRange($response->DateRange));
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

        $node = $document->createElement('SubscriptionEvents');
        $node->appendChild($document->createElement('Name', $this->getName()));
        $node->appendChild($document->createElement('Number', $this->getNumber()));
        $node->appendChild($this->getSubscriptionStatus()->toNode($document));
        $node->appendChild($this->getDateRange()->toNode($document));
        return $node;
    }

    /**
     * @param \Ups\Entity\DateRange $dateRange
     * @return $this
     */
    public function setDateRange($dateRange)
    {
        $this->dateRange = $dateRange;
        return $this;
    }

    /**
     * @return \Ups\Entity\DateRange
     */
    public function getDateRange()
    {
        return $this->dateRange;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $number
     * @return $this
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param \Ups\Entity\SubscriptionEvents $subscriptionStatus
     * @return $this
     */
    public function setSubscriptionStatus($subscriptionStatus)
    {
        $this->subscriptionStatus = $subscriptionStatus;
        return $this;
    }

    /**
     * @return \Ups\Entity\SubscriptionEvents
     */
    public function getSubscriptionStatus()
    {
        return $this->subscriptionStatus;
    }

}
