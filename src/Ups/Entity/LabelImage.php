<?php
namespace Ups\Entity;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class LabelImage implements NodeInterface
{
    /**
     * @var \Ups\Entity\LabelImageFormat
     */
    private $labelImageFormat;

    /**
     * @var string
     */
    private $graphicImage;

    /**
     * @var string
     */
    private $htmlImage;

    /**
     * @var string
     */
    private $pfd417;

    /**
     * @var string
     */
    private $internationalSignatureGraphicImage;

    /**
     * @var string
     */
    private $url;

    function __construct($attributes = null)
    {
        $this->setLabelImageFormat(new LabelImageFormat());

        if (null !== $attributes) {
            if (isset($attributes->LabelImageFormat)) {
                $this->LabelImageFormat = new LabelImageFormat($attributes->LabelImageFormat);
            }
            if (isset($attributes->GraphicImage)) {
                $this->setLabelImageFormat($attributes->GraphicImage);
            }
            if (isset($attributes->HTMLImage)) {
                $this->setHtmlImage($attributes->HTMLImage);
            }
            if (isset($attributes->PDF147)) {
                $this->setPfd417($attributes->PDF147);
            }
            if (isset($attributes->InternationalSignatureGraphicImage)) {
                $this->setInternationalSignatureGraphicImage($attributes->InternationalSignatureGraphicImage);
            }
            if (isset($attributes->URL)) {
                $this->setUrl($attributes->URL);
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

        $node = $document->createElement('LabelImage');
        $node->appendChild($this->getLabelImageFormat()->toNode($document));
        $node->appendChild($document->createElement('GraphicImage', $this->getGraphicImage()));
        $node->appendChild($document->createElement('HTMLImage', $this->getHtmlImage()));
        $node->appendChild($document->createElement('PDF147', $this->getPfd417()));
        $node->appendChild($document->createElement('InternationalSignatureGraphicImage', $this->getInternationalSignatureGraphicImage()));
        $node->appendChild($document->createElement('URL', $this->getUrl()));
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
     * @param string $internationalSignatureGraphicImage
     * @return $this
     */
    public function setInternationalSignatureGraphicImage($internationalSignatureGraphicImage)
    {
        $this->internationalSignatureGraphicImage = $internationalSignatureGraphicImage;
        return $this;
    }

    /**
     * @return string
     */
    public function getInternationalSignatureGraphicImage()
    {
        return $this->internationalSignatureGraphicImage;
    }

    /**
     * @param \Ups\Entity\LabelImageFormat $labelImageFormat
     * @return $this
     */
    public function setLabelImageFormat($labelImageFormat)
    {
        $this->labelImageFormat = $labelImageFormat;
        return $this;
    }

    /**
     * @return \Ups\Entity\LabelImageFormat
     */
    public function getLabelImageFormat()
    {
        return $this->labelImageFormat;
    }

    /**
     * @param string $pfd417
     * @return $this
     */
    public function setPfd417($pfd417)
    {
        $this->pfd417 = $pfd417;
        return $this;
    }

    /**
     * @return string
     */
    public function getPfd417()
    {
        return $this->pfd417;
    }

    /**
     * @param string $url
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

}
