<?php
namespace Ups\Entity\LabelRecoveryRequest;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  Translate implements NodeInterface
{
    /**
     * @var string
     */
    private $languageCode;

    /**
     * @var string
     */
    private $dialectCode;

    /**
     * @var string
     */
    private $code;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->LanguageCode)) {
                $this->setLanguageCode($attributes->LanguageCode);
            }
            if (isset($attributes->DialectCode)) {
                $this->setDialectCode($attributes->DialectCode);
            }
            if (isset($attributes->Code)) {
                $this->setCode($attributes->Code);
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

        $node = $document->createElement('Translate');
        $node->appendChild($document->createElement('LanguageCode', $this->getLanguageCode()));
        if (null !== $this->getDialectCode()) {
            $node->appendChild($document->createElement('DialectCode', $this->getDialectCode()));
        }
        if (null !== $this->getCode()) {
            $node->appendChild($document->createElement('Code', $this->getCode()));
        }
        return $node;
    }

    /**
     * @param string $languageCode
     * @return $this
     */
    public function setLanguageCode($languageCode)
    {
        $this->languageCode = $languageCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getLanguageCode()
    {
        return $this->languageCode;
    }

    /**
     * @param string $dialectCode
     * @return $this
     */
    public function setDialectCode($dialectCode)
    {
        $this->dialectCode = $dialectCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getDialectCode()
    {
        return $this->dialectCode;
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

}
