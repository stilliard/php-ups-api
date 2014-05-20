<?php
namespace Ups\Entity\RateRequest;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  StructuredPhoneNumber implements NodeInterface
{
    /**
     * @var string
     */
    private $phoneCountryCode;

    /**
     * @var string
     */
    private $phoneDialPlanNumber;

    /**
     * @var string
     */
    private $phoneLineNumber;

    /**
     * @var string
     */
    private $phoneExtension;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->PhoneCountryCode)) {
                $this->setPhoneCountryCode($attributes->PhoneCountryCode);
            }
            if (isset($attributes->PhoneDialPlanNumber)) {
                $this->setPhoneDialPlanNumber($attributes->PhoneDialPlanNumber);
            }
            if (isset($attributes->PhoneLineNumber)) {
                $this->setPhoneLineNumber($attributes->PhoneLineNumber);
            }
            if (isset($attributes->PhoneExtension)) {
                $this->setPhoneExtension($attributes->PhoneExtension);
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

        $node = $document->createElement('StructuredPhoneNumber');
        if (null !== $this->getPhoneCountryCode()) {
            $node->appendChild($document->createElement('PhoneCountryCode', $this->getPhoneCountryCode()));
        }
        $node->appendChild($document->createElement('PhoneDialPlanNumber', $this->getPhoneDialPlanNumber()));
        $node->appendChild($document->createElement('PhoneLineNumber', $this->getPhoneLineNumber()));
        if (null !== $this->getPhoneExtension()) {
            $node->appendChild($document->createElement('PhoneExtension', $this->getPhoneExtension()));
        }
        return $node;
    }

    /**
     * @param string $phoneCountryCode
     * @return $this
     */
    public function setPhoneCountryCode($phoneCountryCode)
    {
        $this->phoneCountryCode = $phoneCountryCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneCountryCode()
    {
        return $this->phoneCountryCode;
    }

    /**
     * @param string $phoneDialPlanNumber
     * @return $this
     */
    public function setPhoneDialPlanNumber($phoneDialPlanNumber)
    {
        $this->phoneDialPlanNumber = $phoneDialPlanNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneDialPlanNumber()
    {
        return $this->phoneDialPlanNumber;
    }

    /**
     * @param string $phoneLineNumber
     * @return $this
     */
    public function setPhoneLineNumber($phoneLineNumber)
    {
        $this->phoneLineNumber = $phoneLineNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneLineNumber()
    {
        return $this->phoneLineNumber;
    }

    /**
     * @param string $phoneExtension
     * @return $this
     */
    public function setPhoneExtension($phoneExtension)
    {
        $this->phoneExtension = $phoneExtension;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneExtension()
    {
        return $this->phoneExtension;
    }

}
