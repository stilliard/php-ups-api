<?php
namespace Ups\Entity\TrackResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  SignatureImage implements NodeInterface
{
    /**
     * @var string
     */
    private $graphicImage;

    /**
     * @var \Ups\Entity\TrackResponse\ImageFormat
     */
    private $imageFormat;

    function __construct($attributes = null)
    {
        $this->setImageFormat(new ImageFormat());

        if (null !== $attributes) {
            if (isset($attributes->GraphicImage)) {
                $this->setGraphicImage($attributes->GraphicImage);
            }
            if (isset($attributes->ImageFormat)) {
                $this->setImageFormat(new ImageFormat($attributes->ImageFormat));
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

        $node = $document->createElement('SignatureImage');
        $node->appendChild($document->createElement('GraphicImage', $this->getGraphicImage()));
        $node->appendChild($this->getImageFormat()->toNode($document));
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
     * @param \Ups\Entity\TrackResponse\ImageFormat $imageFormat
     * @return $this
     */
    public function setImageFormat($imageFormat)
    {
        $this->imageFormat = $imageFormat;
        return $this;
    }

    /**
     * @return \Ups\Entity\TrackResponse\ImageFormat
     */
    public function getImageFormat()
    {
        return $this->imageFormat;
    }

}
