<?php
namespace Ups\Entity\QuantumViewRequest;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  SubscriptionRequest implements NodeInterface
{
    /**
     * @var \Ups\Entity\QuantumViewRequest\DateTimeRange
     */
    private $dateTimeRange;

    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $fileName;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->DateTimeRange)) {
                $this->setDateTimeRange(new DateTimeRange($attributes->DateTimeRange));
            }
            if (isset($attributes->Name)) {
                $this->setName($attributes->Name);
            }
            if (isset($attributes->FileName)) {
                $fileName = $this->getFileName();
                foreach ($attributes->FileName as $item) {
                    $fileName[] = $item;
                }
                $this->setFileName($fileName);
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

        $node = $document->createElement('SubscriptionRequest');
        if (null !== $this->getDateTimeRange()) {
            $node->appendChild($this->getDateTimeRange()->toNode($document));
        }
        if (null !== $this->getName()) {
            $node->appendChild($document->createElement('Name', $this->getName()));
        }
        if (null !== $this->getFileName()) {
            if (count($this->getFileName()) > 0) {
                foreach ($this->getFileName() as $FileName) {
                    $node->appendChild($document->createElement('FileName', $FileName));
                }
            }
        }
        return $node;
    }

    /**
     * @param \Ups\Entity\QuantumViewRequest\DateTimeRange $dateTimeRange
     * @return $this
     */
    public function setDateTimeRange($dateTimeRange)
    {
        $this->dateTimeRange = $dateTimeRange;
        return $this;
    }

    /**
     * @return \Ups\Entity\QuantumViewRequest\DateTimeRange
     */
    public function getDateTimeRange()
    {
        return $this->dateTimeRange;
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
     * @param array $fileName
     * @return $this
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
        return $this;
    }

    /**
     * @return array
     */
    public function getFileName()
    {
        return $this->fileName;
    }

}
