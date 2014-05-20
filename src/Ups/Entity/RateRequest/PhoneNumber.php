<?php
namespace Ups\Entity\RateRequest;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  PhoneNumber implements NodeInterface
{
    /**
     * @var \Ups\Entity\RateRequest\StructuredPhoneNumber
     */
    private $structuredPhoneNumber;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->StructuredPhoneNumber)) {
                $this->setStructuredPhoneNumber(new StructuredPhoneNumber($attributes->StructuredPhoneNumber));
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

        $node = $document->createElement('PhoneNumber');
        if (null !== $this->getStructuredPhoneNumber()) {
            $node->appendChild($this->getStructuredPhoneNumber()->toNode($document));
        }
        return $node;
    }

    /**
     * @param \Ups\Entity\RateRequest\StructuredPhoneNumber $structuredPhoneNumber
     * @return $this
     */
    public function setStructuredPhoneNumber($structuredPhoneNumber)
    {
        $this->structuredPhoneNumber = $structuredPhoneNumber;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateRequest\StructuredPhoneNumber
     */
    public function getStructuredPhoneNumber()
    {
        return $this->structuredPhoneNumber;
    }

}
