<?php
namespace Ups\Entity;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class SubscriptionFile implements NodeInterface
{
    /**
     * @var string
     */
    private $fileName;

    /**
     * @var \Ups\Entity\StatusType
     */
    private $statusType;

    /**
     * @var \Ups\Entity\Manifest
     */
    private $manifest;

    /**
     * @var \Ups\Entity\Origin
     */
    private $origin;

    /**
     * @var \Ups\Entity\Exception
     */
    private $exception;

    /**
     * @var \Ups\Entity\Delivery
     */
    private $delivery;

    /**
     * @var \Ups\Entity\Generic
     */
    private $generic;

    function __construct($attributes = null)
    {
        $this->setStatusType(new StatusType());
        $this->setManifest(new Manifest());
        $this->setOrigin(new Origin());
        $this->setException(new Exception());
        $this->setDelivery(new Delivery());
        $this->setGeneric(new Generic());

        if (null !== $attributes) {
            if (isset($attributes->FileName)) {
                $this->setFileName($attributes->FileName);
            }
            if (isset($attributes->StatusType)) {
                $this->setStatusType(new StatusType($attributes->StatusType));
            }
            if (isset($attributes->Manifest)) {
                $this->setManifest(new Manifest($attributes->Manifest));
            }
            if (isset($attributes->Origin)) {
                $this->setOrigin(new Origin($attributes->Origin));
            }
            if (isset($attributes->Exception)) {
                $this->setException(new Exception($attributes->Exception));
            }
            if (isset($attributes->Delivery)) {
                $this->setDelivery(new Delivery($attributes->Delivery));
            }
            if (isset($attributes->Generic)) {
                $this->setGeneric(new Generic($attributes->Generic));
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

        $node = $document->createElement('SubscriptionFile');
        $node->appendChild($document->createElement('FileName', $this->getFileName()));
        $node->appendChild($this->getStatusType()->toNode($document));
        $node->appendChild($this->getManifest()->toNode($document));
        $node->appendChild($this->getOrigin()->toNode($document));
        $node->appendChild($this->getException()->toNode($document));
        $node->appendChild($this->getDelivery()->toNode($document));
        $node->appendChild($this->getGeneric()->toNode($document));
        return $node;
    }

    /**
     * @param \Ups\Entity\Delivery $delivery
     * @return $this
     */
    public function setDelivery($delivery)
    {
        $this->delivery = $delivery;
        return $this;
    }

    /**
     * @return \Ups\Entity\Delivery
     */
    public function getDelivery()
    {
        return $this->delivery;
    }

    /**
     * @param \Ups\Entity\Exception $exception
     * @return $this
     */
    public function setException($exception)
    {
        $this->exception = $exception;
        return $this;
    }

    /**
     * @return \Ups\Entity\Exception
     */
    public function getException()
    {
        return $this->exception;
    }

    /**
     * @param string $fileName
     * @return $this
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
        return $this;
    }

    /**
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param \Ups\Entity\Generic $generic
     * @return $this
     */
    public function setGeneric($generic)
    {
        $this->generic = $generic;
        return $this;
    }

    /**
     * @return \Ups\Entity\Generic
     */
    public function getGeneric()
    {
        return $this->generic;
    }

    /**
     * @param \Ups\Entity\Manifest $manifest
     * @return $this
     */
    public function setManifest($manifest)
    {
        $this->manifest = $manifest;
        return $this;
    }

    /**
     * @return \Ups\Entity\Manifest
     */
    public function getManifest()
    {
        return $this->manifest;
    }

    /**
     * @param \Ups\Entity\Origin $origin
     * @return $this
     */
    public function setOrigin($origin)
    {
        $this->origin = $origin;
        return $this;
    }

    /**
     * @return \Ups\Entity\Origin
     */
    public function getOrigin()
    {
        return $this->origin;
    }

    /**
     * @param \Ups\Entity\StatusType $statusType
     * @return $this
     */
    public function setStatusType($statusType)
    {
        $this->statusType = $statusType;
        return $this;
    }

    /**
     * @return \Ups\Entity\StatusType
     */
    public function getStatusType()
    {
        return $this->statusType;
    }

}
