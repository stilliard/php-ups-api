<?php
namespace Ups\Entity\TimeInTransitRequest;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  AddressArtifactFormat implements NodeInterface
{
    /**
     * @var \Ups\Entity\TimeInTransitRequest\ResidentialAddressIndicator
     */
    private $residentialAddressIndicator;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->ResidentialAddressIndicator)) {
                $this->setResidentialAddressIndicator(new ResidentialAddressIndicator($attributes->ResidentialAddressIndicator));
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

        $node = $document->createElement('AddressArtifactFormat');
        if (null !== $this->getResidentialAddressIndicator()) {
            $node->appendChild($this->getResidentialAddressIndicator()->toNode($document));
        }
        return $node;
    }

    /**
     * @param \Ups\Entity\TimeInTransitRequest\ResidentialAddressIndicator $residentialAddressIndicator
     * @return $this
     */
    public function setResidentialAddressIndicator($residentialAddressIndicator)
    {
        $this->residentialAddressIndicator = $residentialAddressIndicator;
        return $this;
    }

    /**
     * @return \Ups\Entity\TimeInTransitRequest\ResidentialAddressIndicator
     */
    public function getResidentialAddressIndicator()
    {
        return $this->residentialAddressIndicator;
    }

}
