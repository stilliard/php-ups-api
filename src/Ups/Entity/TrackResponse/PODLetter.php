<?php
namespace Ups\Entity\TrackResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  PODLetter implements NodeInterface
{
    /**
     * @var string
     */
    private $hTMLImage;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->HTMLImage)) {
                $this->setHTMLImage($attributes->HTMLImage);
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

        $node = $document->createElement('PODLetter');
        if (null !== $this->getHTMLImage()) {
            $node->appendChild($document->createElement('HTMLImage', $this->getHTMLImage()));
        }
        return $node;
    }

    /**
     * @param string $hTMLImage
     * @return $this
     */
    public function setHTMLImage($hTMLImage)
    {
        $this->hTMLImage = $hTMLImage;
        return $this;
    }

    /**
     * @return string
     */
    public function getHTMLImage()
    {
        return $this->hTMLImage;
    }

}
