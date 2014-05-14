<?php
namespace Ups\Entity;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class Image implements NodeInterface
{
    /**
     * @var \Ups\Entity\ImageFormat
     */
    private $imageFormat;

    /**
     * @var string
     */
    private $graphicImage;

    function __construct($attributes = null)
    {
        $this->setImageFormat(new ImageFormat());

        if (null !== $attributes) {
            if (isset($attributes->ImageFormat)) {
                $this->setImageFormat(new ImageFormat($attributes->ImageFormat));
            }
            if (isset($attributes->GraphicImage)) {
                $this->setGraphicImage($attributes->GraphicImage);
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

        $node = $document->createElement('Image');
        $node->appendChild($this->getImageFormat()->toNode($document));
        $node->appendChild($document->createElement('GraphicImage', $this->getGraphicImage()));
        return $node;
    }

    /**
     * @param string $graphicImage
     * @return $this
     */
    public function setGraphicImage($graphicImage)
    {
        $this->graphicImage = $graphicImage;
        return $this;
    }

    /**
     * @return string
     */
    public function getGraphicImage()
    {
        return $this->graphicImage;
    }

    /**
     * @param \Ups\Entity\ImageFormat $imageFormat
     * @return $this
     */
    public function setImageFormat($imageFormat)
    {
        $this->imageFormat = $imageFormat;
        return $this;
    }

    /**
     * @return \Ups\Entity\ImageFormat
     */
    public function getImageFormat()
    {
        return $this->imageFormat;
    }

}
