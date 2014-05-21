<?php
namespace Ups\Entity\QuantumViewResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  SubscriptionFile implements NodeInterface
{
    /**
     * @var string
     */
    private $fileName;

    /**
     * @var \Ups\Entity\QuantumViewResponse\StatusType
     */
    private $statusType;

    /**
     * @var array
     */
    private $manifest;

    /**
     * @var array
     */
    private $origin;

    /**
     * @var array
     */
    private $exception;

    /**
     * @var array
     */
    private $delivery;

    /**
     * @var array
     */
    private $generic;

    function __construct($attributes = null)
    {
        $this->setStatusType(new StatusType());

        if (null !== $attributes) {
            if (isset($attributes->FileName)) {
                $this->setFileName($attributes->FileName);
            }
            if (isset($attributes->StatusType)) {
                $this->setStatusType(new StatusType($attributes->StatusType));
            }
            if (isset($attributes->Manifest)) {
                $manifest = $this->getManifest();
                foreach ($attributes->Manifest as $item) {
                    $manifest[] = new Manifest($item);
                }
                $this->setManifest($manifest);
            }
            if (isset($attributes->Origin)) {
                $origin = $this->getOrigin();
                foreach ($attributes->Origin as $item) {
                    $origin[] = new Origin($item);
                }
                $this->setOrigin($origin);
            }
            if (isset($attributes->Exception)) {
                $exception = $this->getException();
                foreach ($attributes->Exception as $item) {
                    $exception[] = new Exception($item);
                }
                $this->setException($exception);
            }
            if (isset($attributes->Delivery)) {
                $delivery = $this->getDelivery();
                foreach ($attributes->Delivery as $item) {
                    $delivery[] = new Delivery($item);
                }
                $this->setDelivery($delivery);
            }
            if (isset($attributes->Generic)) {
                $generic = $this->getGeneric();
                foreach ($attributes->Generic as $item) {
                    $generic[] = new Generic($item);
                }
                $this->setGeneric($generic);
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
        if (null !== $this->getManifest()) {
            if (count($this->getManifest()) > 0) {
                foreach ($this->getManifest() as $Manifest) {
                    $node->appendChild($Manifest->toNode($document));
                }
            }
        }
        if (null !== $this->getOrigin()) {
            if (count($this->getOrigin()) > 0) {
                foreach ($this->getOrigin() as $Origin) {
                    $node->appendChild($Origin->toNode($document));
                }
            }
        }
        if (null !== $this->getException()) {
            if (count($this->getException()) > 0) {
                foreach ($this->getException() as $Exception) {
                    $node->appendChild($Exception->toNode($document));
                }
            }
        }
        if (null !== $this->getDelivery()) {
            if (count($this->getDelivery()) > 0) {
                foreach ($this->getDelivery() as $Delivery) {
                    $node->appendChild($Delivery->toNode($document));
                }
            }
        }
        if (null !== $this->getGeneric()) {
            if (count($this->getGeneric()) > 0) {
                foreach ($this->getGeneric() as $Generic) {
                    $node->appendChild($Generic->toNode($document));
                }
            }
        }
        return $node;
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
     * @param \Ups\Entity\QuantumViewResponse\Status $statusType
     * @return $this
     */
    public function setStatusType($statusType)
    {
        $this->statusType = $statusType;
        return $this;
    }

    /**
     * @return \Ups\Entity\QuantumViewResponse\StatusType
     */
    public function getStatusType()
    {
        return $this->statusType;
    }

    /**
     * @param array $manifest
     * @return $this
     */
    public function setManifest($manifest)
    {
        $this->manifest = $manifest;
        return $this;
    }

    /**
     * @return array
     */
    public function getManifest()
    {
        return $this->manifest;
    }

    /**
     * @param array $origin
     * @return $this
     */
    public function setOrigin($origin)
    {
        $this->origin = $origin;
        return $this;
    }

    /**
     * @return array
     */
    public function getOrigin()
    {
        return $this->origin;
    }

    /**
     * @param array $exception
     * @return $this
     */
    public function setException($exception)
    {
        $this->exception = $exception;
        return $this;
    }

    /**
     * @return array
     */
    public function getException()
    {
        return $this->exception;
    }

    /**
     * @param array $delivery
     * @return $this
     */
    public function setDelivery($delivery)
    {
        $this->delivery = $delivery;
        return $this;
    }

    /**
     * @return array
     */
    public function getDelivery()
    {
        return $this->delivery;
    }

    /**
     * @param array $generic
     * @return $this
     */
    public function setGeneric($generic)
    {
        $this->generic = $generic;
        return $this;
    }

    /**
     * @return array
     */
    public function getGeneric()
    {
        return $this->generic;
    }

}
