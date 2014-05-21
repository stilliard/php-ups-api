<?php
namespace Ups\Entity\TrackResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  Document implements NodeInterface
{
    /**
     * @var \Ups\Entity\TrackResponse\Type
     */
    private $type;

    /**
     * @var string
     */
    private $graphicImage;

    /**
     * @var \Ups\Entity\TrackResponse\Format
     */
    private $format;

    function __construct($attributes = null)
    {
        $this->setType(new Type());
        $this->setFormat(new Format());

        if (null !== $attributes) {
            if (isset($attributes->Type)) {
                $this->setType(new Type($attributes->Type));
            }
            if (isset($attributes->GraphicImage)) {
                $this->setGraphicImage($attributes->GraphicImage);
            }
            if (isset($attributes->Format)) {
                $this->setFormat(new Format($attributes->Format));
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

        $node = $document->createElement('Document');
        $node->appendChild($this->getType()->toNode($document));
        $node->appendChild($document->createElement('GraphicImage', $this->getGraphicImage()));
        $node->appendChild($this->getFormat()->toNode($document));
        return $node;
    }

    /**
     * @param \Ups\Entity\TrackResponse\Type $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return \Ups\Entity\TrackResponse\Type
     */
    public function getType()
    {
        return $this->type;
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
     * @param \Ups\Entity\TrackResponse\Format $format
     * @return $this
     */
    public function setFormat($format)
    {
        $this->format = $format;
        return $this;
    }

    /**
     * @return \Ups\Entity\TrackResponse\Format
     */
    public function getFormat()
    {
        return $this->format;
    }

}
