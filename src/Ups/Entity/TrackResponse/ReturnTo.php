<?php
namespace Ups\Entity\TrackResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  ReturnTo implements NodeInterface
{
    /**
     * @var \Ups\Entity\TrackResponse\Address
     */
    private $address;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->Address)) {
                $this->setAddress(new Address($attributes->Address));
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

        $node = $document->createElement('ReturnTo');
        if (null !== $this->getAddress()) {
            $node->appendChild($this->getAddress()->toNode($document));
        }
        return $node;
    }

    /**
     * @param \Ups\Entity\TrackResponse\Address $address
     * @return $this
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return \Ups\Entity\TrackResponse\Address
     */
    public function getAddress()
    {
        return $this->address;
    }

}
