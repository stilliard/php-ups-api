<?php
namespace Ups\Entity;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class PackagingType implements NodeInterface
{
    const PT_UNKONW = '00';
    const PT_UPSLETTER = '01';
    const PT_PACKAGE = '02';
    const PT_TUBE = '03';
    const PT_PAK = '04';
    const PT_EXPRESSBOX = '21';
    const PT_25KGBOX = '24';
    const PT_10KGBOX = '25';
    const PT_PALLET = '30';
    const PT_EXPRESSBOX_SM = '2a';
    const PT_EXPRESSBOX_MD = '2b';
    const PT_EXPRESSBOX_L = '2c';

    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $description;

    function __construct($attributes = null)
    {
        $this->setCode(self::PT_UNKONW);

        if (null !== $attributes) {
            if (isset($attributes->Code)) {
                $this->setCode($attributes->Code);
            }
            if (isset($attributes->Description)) {
                $this->setDescription($attributes->Description);
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

        $node = $document->createElement('PackagingType');
        $node->appendChild($document->createElement('Code', $this->getCode()));
        $node->appendChild($document->createElement('Description', $this->getDescription()));
        return $node;
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

}
