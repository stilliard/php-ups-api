<?php
namespace Ups\Entity\LabelRecoveryResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  Receipt implements NodeInterface
{
    /**
     * @var string
     */
    private $hTMLImage;

    /**
     * @var \Ups\Entity\LabelRecoveryResponse\Image
     */
    private $image;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->HTMLImage)) {
                $this->setHTMLImage($attributes->HTMLImage);
            }
            if (isset($attributes->Image)) {
                $this->setImage(new Image($attributes->Image));
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

        $node = $document->createElement('Receipt');
        if (null !== $this->getHTMLImage()) {
            $node->appendChild($document->createElement('HTMLImage', $this->getHTMLImage()));
        }
        if (null !== $this->getImage()) {
            $node->appendChild($this->getImage()->toNode($document));
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

    /**
     * @param \Ups\Entity\LabelRecoveryResponse\Image $image
     * @return $this
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return \Ups\Entity\LabelRecoveryResponse\Image
     */
    public function getImage()
    {
        return $this->image;
    }

}
