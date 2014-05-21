<?php
namespace Ups\Entity\TrackResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  ShipmentLocation implements NodeInterface
{
    /**
     * @var array
     */
    private $address;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->Address)) {
                $address = $this->getAddress();
                foreach ($attributes->Address as $item) {
                    $address[] = new Address($item);
                }
                $this->setAddress($address);
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

        $node = $document->createElement('ShipmentLocation');
        if (null !== $this->getAddress()) {
            if (count($this->getAddress()) > 0) {
                foreach ($this->getAddress() as $Address) {
                    $node->appendChild($Address->toNode($document));
                }
            }
        }
        return $node;
    }

    /**
     * @param array $address
     * @return $this
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return array
     */
    public function getAddress()
    {
        return $this->address;
    }

}
