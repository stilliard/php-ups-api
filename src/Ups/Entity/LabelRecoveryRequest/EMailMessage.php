<?php
namespace Ups\Entity\LabelRecoveryRequest;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  EMailMessage implements NodeInterface
{
    /**
     * @var string
     */
    private $eMailAddress;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->EMailAddress)) {
                $this->setEMailAddress($attributes->EMailAddress);
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

        $node = $document->createElement('EMailMessage');
        $node->appendChild($document->createElement('EMailAddress', $this->getEMailAddress()));
        return $node;
    }

    /**
     * @param string $eMailAddress
     * @return $this
     */
    public function setEMailAddress($eMailAddress)
    {
        $this->eMailAddress = $eMailAddress;
        return $this;
    }

    /**
     * @return string
     */
    public function getEMailAddress()
    {
        return $this->eMailAddress;
    }

}
