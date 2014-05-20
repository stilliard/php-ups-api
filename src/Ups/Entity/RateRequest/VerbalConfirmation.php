<?php
namespace Ups\Entity\RateRequest;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  VerbalConfirmation implements NodeInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var \Ups\Entity\RateRequest\PhoneNumber
     */
    private $phoneNumber;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->Name)) {
                $this->setName($attributes->Name);
            }
            if (isset($attributes->PhoneNumber)) {
                $this->setPhoneNumber(new PhoneNumber($attributes->PhoneNumber));
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

        $node = $document->createElement('VerbalConfirmation');
        if (null !== $this->getName()) {
            $node->appendChild($document->createElement('Name', $this->getName()));
        }
        if (null !== $this->getPhoneNumber()) {
            $node->appendChild($this->getPhoneNumber()->toNode($document));
        }
        return $node;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param \Ups\Entity\RateRequest\PhoneNumber $phoneNumber
     * @return $this
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    /**
     * @return \Ups\Entity\RateRequest\PhoneNumber
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

}
