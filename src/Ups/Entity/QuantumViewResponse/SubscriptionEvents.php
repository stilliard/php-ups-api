<?php
namespace Ups\Entity\QuantumViewResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  SubscriptionEvents implements NodeInterface
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
     * @var \Ups\Entity\QuantumViewResponse\SubscriptionStatus
     */
    private $subscriptionStatus;

    /**
     * @var \Ups\Entity\QuantumViewResponse\DateRange
     */
    private $dateRange;

    /**
     * @var array
     */
    private $subscriptionFile;

    function __construct($attributes = null)
    {
        $this->setSubscriptionStatus(new SubscriptionStatus());

        if (null !== $attributes) {
            if (isset($attributes->Name)) {
                $this->setName($attributes->Name);
            }
            if (isset($attributes->Number)) {
                $this->setNumber($attributes->Number);
            }
            if (isset($attributes->SubscriptionStatus)) {
                $this->setSubscriptionStatus(new SubscriptionStatus($attributes->SubscriptionStatus));
            }
            if (isset($attributes->DateRange)) {
                $this->setDateRange(new DateRange($attributes->DateRange));
            }
            if (isset($attributes->SubscriptionFile)) {
                $subscriptionFile = $this->getSubscriptionFile();
                foreach ($attributes->SubscriptionFile as $item) {
                    $subscriptionFile[] = new SubscriptionFile($item);
                }
                $this->setSubscriptionFile($subscriptionFile);
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
        if (null !== $this->getDateRange()) {
            $node->appendChild($this->getDateRange()->toNode($document));
        }
        if (null !== $this->getSubscriptionFile()) {
            if (count($this->getSubscriptionFile()) > 0) {
                foreach ($this->getSubscriptionFile() as $SubscriptionFile) {
                    $node->appendChild($SubscriptionFile->toNode($document));
                }
            }
        }
        return $node;
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
     * @param \Ups\Entity\QuantumViewResponse\SubscriptionStatus $subscriptionStatus
     * @return $this
     */
    public function setSubscriptionStatus($subscriptionStatus)
    {
        $this->subscriptionStatus = $subscriptionStatus;
        return $this;
    }

    /**
     * @return \Ups\Entity\QuantumViewResponse\SubscriptionStatus
     */
    public function getSubscriptionStatus()
    {
        return $this->subscriptionStatus;
    }

    /**
     * @param \Ups\Entity\QuantumViewResponse\DateRange $dateRange
     * @return $this
     */
    public function setDateRange($dateRange)
    {
        $this->dateRange = $dateRange;
        return $this;
    }

    /**
     * @return \Ups\Entity\QuantumViewResponse\DateRange
     */
    public function getDateRange()
    {
        return $this->dateRange;
    }

    /**
     * @param array $subscriptionFile
     * @return $this
     */
    public function setSubscriptionFile($subscriptionFile)
    {
        $this->subscriptionFile = $subscriptionFile;
        return $this;
    }

    /**
     * @return array
     */
    public function getSubscriptionFile()
    {
        return $this->subscriptionFile;
    }

}
