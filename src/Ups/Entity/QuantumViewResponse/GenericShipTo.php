<?php
namespace Ups\Entity\QuantumViewResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  GenericShipTo implements NodeInterface
{
    /**
     * @var string
     */
    private $locationID;

    /**
     * @var string
     */
    private $receivingAddressName;

    /**
     * @var string
     */
    private $bookmark;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->LocationID)) {
                $this->setLocationID($attributes->LocationID);
            }
            if (isset($attributes->ReceivingAddressName)) {
                $this->setReceivingAddressName($attributes->ReceivingAddressName);
            }
            if (isset($attributes->Bookmark)) {
                $this->setBookmark($attributes->Bookmark);
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

        $node = $document->createElement('GenericShipTo');
        if (null !== $this->getLocationID()) {
            $node->appendChild($document->createElement('LocationID', $this->getLocationID()));
        }
        if (null !== $this->getReceivingAddressName()) {
            $node->appendChild($document->createElement('ReceivingAddressName', $this->getReceivingAddressName()));
        }
        if (null !== $this->getBookmark()) {
            $node->appendChild($document->createElement('Bookmark', $this->getBookmark()));
        }
        return $node;
    }

    /**
     * @param string $locationID
     * @return $this
     */
    public function setLocationID($locationID)
    {
        $this->locationID = $locationID;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocationID()
    {
        return $this->locationID;
    }

    /**
     * @param string $receivingAddressName
     * @return $this
     */
    public function setReceivingAddressName($receivingAddressName)
    {
        $this->receivingAddressName = $receivingAddressName;
        return $this;
    }

    /**
     * @return string
     */
    public function getReceivingAddressName()
    {
        return $this->receivingAddressName;
    }

    /**
     * @param string $bookmark
     * @return $this
     */
    public function setBookmark($bookmark)
    {
        $this->bookmark = $bookmark;
        return $this;
    }

    /**
     * @return string
     */
    public function getBookmark()
    {
        return $this->bookmark;
    }

}
