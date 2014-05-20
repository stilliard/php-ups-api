<?php
namespace Ups\Entity\LabelRecoveryResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  LabelImage implements NodeInterface
{
    /**
     * @var \Ups\Entity\LabelRecoveryResponse\LabelImageFormat
     */
    private $labelImageFormat;

    /**
     * @var string
     */
    private $graphicImage;

    /**
     * @var string
     */
    private $hTMLImage;

    /**
     * @var string
     */
    private $pDF417;

    /**
     * @var string
     */
    private $internationalSignatureGraphicImage;

    /**
     * @var string
     */
    private $uRL;

    function __construct($attributes = null)
    {
        $this->setLabelImageFormat(new LabelImageFormat());

        if (null !== $attributes) {
            if (isset($attributes->LabelImageFormat)) {
                $this->setLabelImageFormat(new LabelImageFormat($attributes->LabelImageFormat));
            }
            if (isset($attributes->GraphicImage)) {
                $this->setGraphicImage($attributes->GraphicImage);
            }
            if (isset($attributes->HTMLImage)) {
                $this->setHTMLImage($attributes->HTMLImage);
            }
            if (isset($attributes->PDF417)) {
                $this->setPDF417($attributes->PDF417);
            }
            if (isset($attributes->InternationalSignatureGraphicImage)) {
                $this->setInternationalSignatureGraphicImage($attributes->InternationalSignatureGraphicImage);
            }
            if (isset($attributes->URL)) {
                $this->setURL($attributes->URL);
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
        if (null !== $this->getHTMLImage()) {
            $node->appendChild($document->createElement('HTMLImage', $this->getHTMLImage()));
        }
        if (null !== $this->getPDF417()) {
            $node->appendChild($document->createElement('PDF417', $this->getPDF417()));
        }
        if (null !== $this->getInternationalSignatureGraphicImage()) {
            $node->appendChild($document->createElement('InternationalSignatureGraphicImage', $this->getInternationalSignatureGraphicImage()));
        }
        if (null !== $this->getURL()) {
            $node->appendChild($document->createElement('URL', $this->getURL()));
        }
        return $node;
    }

    /**
     * @param \Ups\Entity\LabelRecoveryResponse\LabelImageFormat $labelImageFormat
     * @return $this
     */
    public function setLabelImageFormat($labelImageFormat)
    {
        $this->labelImageFormat = $labelImageFormat;
        return $this;
    }

    /**
     * @return \Ups\Entity\LabelRecoveryResponse\LabelImageFormat
     */
    public function getLabelImageFormat()
    {
        return $this->labelImageFormat;
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
     * @param string $pDF417
     * @return $this
     */
    public function setPDF417($pDF417)
    {
        $this->pDF417 = $pDF417;
        return $this;
    }

    /**
     * @return string
     */
    public function getPDF417()
    {
        return $this->pDF417;
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
     * @param string $uRL
     * @return $this
     */
    public function setURL($uRL)
    {
        $this->uRL = $uRL;
        return $this;
    }

    /**
     * @return string
     */
    public function getURL()
    {
        return $this->uRL;
    }

}
