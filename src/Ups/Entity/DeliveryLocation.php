<?php
namespace Ups\Entity;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class DeliveryLocation implements NodeInterface
{
    /**
     * @var \Ups\Entity\AddressArtifactFormat
     */
    private $addressArtifactFormat;

    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $signedForByName;

    function __construct($attributes = null)
    {
        $this->setAddressArtifactFormat(new AddressArtifactFormat());

        if (null !== $attributes) {
            if (isset($attributes->AddressArtifactFormat)) {
                $this->setAddressArtifactFormat(new AddressArtifactFormat($attributes->AddressArtifactFormat));
            }
            if (isset($attributes->Code)) {
                $this->setCode($attributes->Code);
            }
            if (isset($attributes->Description)) {
                $this->setDescription($attributes->Description);
            }
            if (isset($attributes->SignedForByName)) {
                $this->setSignedForByName($attributes->SignedForByName);
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

        $node = $document->createElement('DeliveryLocation');
        $node->appendChild($this->getAddressArtifactFormat()->toNode($document));
        $node->appendChild($document->createElement('Code', $this->getCode()));
        $node->appendChild($document->createElement('Description', $this->getDescription()));
        $node->appendChild($document->createElement('SignedForByName', $this->getSignedForByName()));
        return $node;
    }

    /**
     * @param \Ups\Entity\AddressArtifactFormat $addressArtifactFormat
     * @return $this
     */
    public function setAddressArtifactFormat($addressArtifactFormat)
    {
        $this->addressArtifactFormat = $addressArtifactFormat;
        return $this;
    }

    /**
     * @return \Ups\Entity\AddressArtifactFormat
     */
    public function getAddressArtifactFormat()
    {
        return $this->addressArtifactFormat;
    }

    /**
     * @param string $code
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $signedForByName
     * @return $this
     */
    public function setSignedForByName($signedForByName)
    {
        $this->signedForByName = $signedForByName;
        return $this;
    }

    /**
     * @return string
     */
    public function getSignedForByName()
    {
        return $this->signedForByName;
    }

}
