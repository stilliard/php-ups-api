<?php
namespace Ups\Entity\TrackResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  ActivityLocation implements NodeInterface
{
    /**
     * @var \Ups\Entity\TrackResponse\Address
     */
    private $address;

    /**
     * @var \Ups\Entity\TrackResponse\AddressArtifactFormat
     */
    private $addressArtifactFormat;

    /**
     * @var \Ups\Entity\TrackResponse\TransportFacility
     */
    private $transportFacility;

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

    /**
     * @var \Ups\Entity\TrackResponse\SignatureImage
     */
    private $signatureImage;

    /**
     * @var \Ups\Entity\TrackResponse\PODLetter
     */
    private $pODLetter;

    /**
     * @var \Ups\Entity\TrackResponse\ElectronicDeliveryNotification
     */
    private $electronicDeliveryNotification;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->Address)) {
                $this->setAddress(new Address($attributes->Address));
            }
            if (isset($attributes->AddressArtifactFormat)) {
                $this->setAddressArtifactFormat(new AddressArtifactFormat($attributes->AddressArtifactFormat));
            }
            if (isset($attributes->TransportFacility)) {
                $this->setTransportFacility(new TransportFacility($attributes->TransportFacility));
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
            if (isset($attributes->SignatureImage)) {
                $this->setSignatureImage(new SignatureImage($attributes->SignatureImage));
            }
            if (isset($attributes->PODLetter)) {
                $this->setPODLetter(new PODLetter($attributes->PODLetter));
            }
            if (isset($attributes->ElectronicDeliveryNotification)) {
                $this->setElectronicDeliveryNotification(new ElectronicDeliveryNotification($attributes->ElectronicDeliveryNotification));
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
        if (null !== $this->getAddress()) {
            $node->appendChild($this->getAddress()->toNode($document));
        }
        if (null !== $this->getAddressArtifactFormat()) {
            $node->appendChild($this->getAddressArtifactFormat()->toNode($document));
        }
        if (null !== $this->getTransportFacility()) {
            $node->appendChild($this->getTransportFacility()->toNode($document));
        }
        if (null !== $this->getCode()) {
            $node->appendChild($document->createElement('Code', $this->getCode()));
        }
        if (null !== $this->getDescription()) {
            $node->appendChild($document->createElement('Description', $this->getDescription()));
        }
        if (null !== $this->getSignedForByName()) {
            $node->appendChild($document->createElement('SignedForByName', $this->getSignedForByName()));
        }
        if (null !== $this->getSignatureImage()) {
            $node->appendChild($this->getSignatureImage()->toNode($document));
        }
        if (null !== $this->getPODLetter()) {
            $node->appendChild($this->getPODLetter()->toNode($document));
        }
        if (null !== $this->getElectronicDeliveryNotification()) {
            $node->appendChild($this->getElectronicDeliveryNotification()->toNode($document));
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

    /**
     * @param \Ups\Entity\TrackResponse\AddressArtifactFormat $addressArtifactFormat
     * @return $this
     */
    public function setAddressArtifactFormat($addressArtifactFormat)
    {
        $this->addressArtifactFormat = $addressArtifactFormat;
        return $this;
    }

    /**
     * @return \Ups\Entity\TrackResponse\AddressArtifactFormat
     */
    public function getAddressArtifactFormat()
    {
        return $this->addressArtifactFormat;
    }

    /**
     * @param \Ups\Entity\TrackResponse\TransportFacility $transportFacility
     * @return $this
     */
    public function setTransportFacility($transportFacility)
    {
        $this->transportFacility = $transportFacility;
        return $this;
    }

    /**
     * @return \Ups\Entity\TrackResponse\TransportFacility
     */
    public function getTransportFacility()
    {
        return $this->transportFacility;
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

    /**
     * @param \Ups\Entity\TrackResponse\SignatureImage $signatureImage
     * @return $this
     */
    public function setSignatureImage($signatureImage)
    {
        $this->signatureImage = $signatureImage;
        return $this;
    }

    /**
     * @return \Ups\Entity\TrackResponse\SignatureImage
     */
    public function getSignatureImage()
    {
        return $this->signatureImage;
    }

    /**
     * @param \Ups\Entity\TrackResponse\PODLetter $pODLetter
     * @return $this
     */
    public function setPODLetter($pODLetter)
    {
        $this->pODLetter = $pODLetter;
        return $this;
    }

    /**
     * @return \Ups\Entity\TrackResponse\PODLetter
     */
    public function getPODLetter()
    {
        return $this->pODLetter;
    }

    /**
     * @param \Ups\Entity\TrackResponse\ElectronicDeliveryNotification $electronicDeliveryNotification
     * @return $this
     */
    public function setElectronicDeliveryNotification($electronicDeliveryNotification)
    {
        $this->electronicDeliveryNotification = $electronicDeliveryNotification;
        return $this;
    }

    /**
     * @return \Ups\Entity\TrackResponse\ElectronicDeliveryNotification
     */
    public function getElectronicDeliveryNotification()
    {
        return $this->electronicDeliveryNotification;
    }

}
