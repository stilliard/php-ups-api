<?php
namespace Ups\Entity\LabelRecoveryResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  Image implements NodeInterface
{
    /**
     * @var \Ups\Entity\LabelRecoveryResponse\ImageFormat
     */
    private $imageFormat;

    /**
     * @var string
     */
    private $graphicImage;

    function __construct($attributes = null)
    {

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
        if (null !== $this->getImageFormat()) {
            $node->appendChild($this->getImageFormat()->toNode($document));
        }
        if (null !== $this->getGraphicImage()) {
            $node->appendChild($document->createElement('GraphicImage', $this->getGraphicImage()));
        }
        return $node;
    }

    /**
     * @param \Ups\Entity\LabelRecoveryResponse\ImageFormat $imageFormat
     * @return $this
     */
    public function setImageFormat($imageFormat)
    {
        $this->imageFormat = $imageFormat;
        return $this;
    }

    /**
     * @return \Ups\Entity\LabelRecoveryResponse\ImageFormat
     */
    public function getImageFormat()
    {
        return $this->imageFormat;
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

}
