<?php
namespace Ups\Entity;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class Receipt implements NodeInterface
{
    /**
     * @var string
     */
    private $htmlImage;

    /**
     * @var \Ups\Entity\Image
     */
    private $image;

    function __construct($attributes = null)
    {
        $this->setImage(new Image());

        if (null !== $attributes) {
            if (isset($attributes->HTMLImage)) {
                $this->setHtmlImage($attributes->HTMLImage);
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
        $node->appendChild($document->createElement('HTMLImage', $this->getHtmlImage()));
        $node->appendChild($this->getImage()->toNode($document));
        return $node;
    }

    /**
     * @param string $htmlImage
     * @return $this
     */
    public function setHtmlImage($htmlImage)
    {
        $this->htmlImage = $htmlImage;
        return $this;
    }

    /**
     * @return string
     */
    public function getHtmlImage()
    {
        return $this->htmlImage;
    }

    /**
     * @param \Ups\Entity\Image $image
     * @return $this
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return \Ups\Entity\Image
     */
    public function getImage()
    {
        return $this->image;
    }

}
