<?php
namespace Ups\Entity\QuantumViewResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  ActivityLocation implements NodeInterface
{
    /**
     * @var \Ups\Entity\QuantumViewResponse\AddressArtifactFormat
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
        $node->appendChild($this->getAddressArtifactFormat()->toNode($document));
        return $node;
    }

    /**
     * @param \Ups\Entity\QuantumViewResponse\AddressArtifactFormat $addressArtifactFormat
     * @return $this
     */
    public function setAddressArtifactFormat($addressArtifactFormat)
    {
        $this->addressArtifactFormat = $addressArtifactFormat;
        return $this;
    }

    /**
     * @return \Ups\Entity\QuantumViewResponse\AddressArtifactFormat
     */
    public function getAddressArtifactFormat()
    {
        return $this->addressArtifactFormat;
    }

}
