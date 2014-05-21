<?php
namespace Ups\Entity\TrackResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  COD implements NodeInterface
{
    /**
     * @var \Ups\Entity\TrackResponse\CODAmount
     */
    private $cODAmount;

    /**
     * @var string
     */
    private $controlNumber;

    /**
     * @var string
     */
    private $cODStatus;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->CODAmount)) {
                $this->setCODAmount(new CODAmount($attributes->CODAmount));
            }
            if (isset($attributes->ControlNumber)) {
                $this->setControlNumber($attributes->ControlNumber);
            }
            if (isset($attributes->CODStatus)) {
                $this->setCODStatus($attributes->CODStatus);
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

        $node = $document->createElement('COD');
        if (null !== $this->getCODAmount()) {
            $node->appendChild($this->getCODAmount()->toNode($document));
        }
        if (null !== $this->getControlNumber()) {
            $node->appendChild($document->createElement('ControlNumber', $this->getControlNumber()));
        }
        if (null !== $this->getCODStatus()) {
            $node->appendChild($document->createElement('CODStatus', $this->getCODStatus()));
        }
        return $node;
    }

    /**
     * @param \Ups\Entity\TrackResponse\CODAmount $cODAmount
     * @return $this
     */
    public function setCODAmount($cODAmount)
    {
        $this->cODAmount = $cODAmount;
        return $this;
    }

    /**
     * @return \Ups\Entity\TrackResponse\CODAmount
     */
    public function getCODAmount()
    {
        return $this->cODAmount;
    }

    /**
     * @param string $controlNumber
     * @return $this
     */
    public function setControlNumber($controlNumber)
    {
        $this->controlNumber = $controlNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getControlNumber()
    {
        return $this->controlNumber;
    }

    /**
     * @param string $cODStatus
     * @return $this
     */
    public function setCODStatus($cODStatus)
    {
        $this->cODStatus = $cODStatus;
        return $this;
    }

    /**
     * @return string
     */
    public function getCODStatus()
    {
        return $this->cODStatus;
    }

}
