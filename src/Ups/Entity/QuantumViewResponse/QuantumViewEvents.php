<?php
namespace Ups\Entity\QuantumViewResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  QuantumViewEvents implements NodeInterface
{
    /**
     * @var string
     */
    private $subscriberID;

    /**
     * @var array
     */
    private $subscriptionEvents;

    function __construct($attributes = null)
    {
        $this->setSubscriptionEvents = array();

        if (null !== $attributes) {
            if (isset($attributes->SubscriberID)) {
                $this->setSubscriberID($attributes->SubscriberID);
            }
            if (isset($attributes->SubscriptionEvents)) {
                $subscriptionEvents = $this->getSubscriptionEvents();
                foreach ($attributes->SubscriptionEvents as $item) {
                    $subscriptionEvents[] = new SubscriptionEvents($item);
                }
                $this->setSubscriptionEvents($subscriptionEvents);
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

        $node = $document->createElement('QuantumViewEvents');
        $node->appendChild($document->createElement('SubscriberID', $this->getSubscriberID()));
        if (count($this->getSubscriptionEvents()) > 0) {
            foreach ($this->getSubscriptionEvents() as $SubscriptionEvents) {
                $node->appendChild($SubscriptionEvents->toNode($document));
            }
        }
        return $node;
    }

    /**
     * @param string $subscriberID
     * @return $this
     */
    public function setSubscriberID($subscriberID)
    {
        $this->subscriberID = $subscriberID;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubscriberID()
    {
        return $this->subscriberID;
    }

    /**
     * @param array $subscriptionEvents
     * @return $this
     */
    public function setSubscriptionEvents($subscriptionEvents)
    {
        $this->subscriptionEvents = $subscriptionEvents;
        return $this;
    }

    /**
     * @return array
     */
    public function getSubscriptionEvents()
    {
        return $this->subscriptionEvents;
    }

}
