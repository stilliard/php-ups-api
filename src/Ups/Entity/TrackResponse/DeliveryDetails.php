<?php
namespace Ups\Entity\TrackResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  DeliveryDetails implements NodeInterface
{
    /**
     * @var \Ups\Entity\TrackResponse\DeliveryDate
     */
    private $deliveryDate;

    /**
     * @var \Ups\Entity\TrackResponse\ServiceCenter
     */
    private $serviceCenter;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->DeliveryDate)) {
                $this->setDeliveryDate(new DeliveryDate($attributes->DeliveryDate));
            }
            if (isset($attributes->ServiceCenter)) {
                $this->setServiceCenter(new ServiceCenter($attributes->ServiceCenter));
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

        $node = $document->createElement('DeliveryDetails');
        if (null !== $this->getDeliveryDate()) {
            $node->appendChild($this->getDeliveryDate()->toNode($document));
        }
        if (null !== $this->getServiceCenter()) {
            $node->appendChild($this->getServiceCenter()->toNode($document));
        }
        return $node;
    }

    /**
     * @param \Ups\Entity\TrackResponse\DeliveryDate $deliveryDate
     * @return $this
     */
    public function setDeliveryDate($deliveryDate)
    {
        $this->deliveryDate = $deliveryDate;
        return $this;
    }

    /**
     * @return \Ups\Entity\TrackResponse\DeliveryDate
     */
    public function getDeliveryDate()
    {
        return $this->deliveryDate;
    }

    /**
     * @param \Ups\Entity\TrackResponse\ServiceCenter $serviceCenter
     * @return $this
     */
    public function setServiceCenter($serviceCenter)
    {
        $this->serviceCenter = $serviceCenter;
        return $this;
    }

    /**
     * @return \Ups\Entity\TrackResponse\ServiceCenter
     */
    public function getServiceCenter()
    {
        return $this->serviceCenter;
    }

}
