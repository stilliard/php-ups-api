<?php
namespace Ups\Entity\TrackResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  ServiceCenter implements NodeInterface
{
    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $stateProvinceCode;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->City)) {
                $this->setCity($attributes->City);
            }
            if (isset($attributes->StateProvinceCode)) {
                $this->setStateProvinceCode($attributes->StateProvinceCode);
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

        $node = $document->createElement('ServiceCenter');
        $node->appendChild($document->createElement('City', $this->getCity()));
        $node->appendChild($document->createElement('StateProvinceCode', $this->getStateProvinceCode()));
        return $node;
    }

    /**
     * @param string $city
     * @return $this
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $stateProvinceCode
     * @return $this
     */
    public function setStateProvinceCode($stateProvinceCode)
    {
        $this->stateProvinceCode = $stateProvinceCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getStateProvinceCode()
    {
        return $this->stateProvinceCode;
    }

}
