<?php
namespace Ups\Entity;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class ActivityLocation implements NodeInterface
{
    /**
     * @var \Ups\Entity\AddressArtifactFormat
     */
    private $addressArtifactFormat;

    function __construct($attributes = null)
    {
        $this->setAddressArtifactFormat(new AddressArtifactFormat());

        if (null !== $attributes) {
            if (isset($attributes->AddressArtifactFormat)) {
                $this->setAddressArtifactFormat(new AddressArtifactFormat($attributes->AddressArtifactFormat));
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
        $node = $document->createElement('ActivityLocation');
        $node->appendChild($this->addressArtifactFormat->toNode($document));
        return $node;
    }

    /**
     * @param \Ups\Entity\AddressArtifactFormat $AddressArtifactFormat
     * @return $this
     */
    public function setAddressArtifactFormat(\Ups\Entity\AddressArtifactFormat $AddressArtifactFormat)
    {
        $this->addressArtifactFormat = $AddressArtifactFormat;
        return $this;
    }

    /**
     * @return \Ups\Entity\AddressArtifactFormat
     */
    public function getAddressArtifactFormat()
    {
        return $this->addressArtifactFormat;
    }


}
