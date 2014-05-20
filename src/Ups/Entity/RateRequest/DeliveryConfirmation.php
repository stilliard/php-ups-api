<?php
namespace Ups\Entity\RateRequest;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  DeliveryConfirmation implements NodeInterface
{
    /**
     * @var string
     */
    private $dCIS;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->DCIS)) {
                $this->setDCIS($attributes->DCIS);
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

        $node = $document->createElement('DeliveryConfirmation');
        $node->appendChild($document->createElement('DCIS', $this->getDCIS()));
        return $node;
    }

    /**
     * @param string $dCIS
     * @return $this
     */
    public function setDCIS($dCIS)
    {
        $this->dCIS = $dCIS;
        return $this;
    }

    /**
     * @return string
     */
    public function getDCIS()
    {
        return $this->dCIS;
    }

}
