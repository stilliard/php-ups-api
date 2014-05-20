<?php
namespace Ups\Entity\LabelRecoveryResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  LabelResults implements NodeInterface
{
    /**
     * @var string
     */
    private $trackingNumber;

    /**
     * @var \Ups\Entity\LabelRecoveryResponse\LabelImage
     */
    private $labelImage;

    /**
     * @var \Ups\Entity\LabelRecoveryResponse\Receipt
     */
    private $receipt;

    function __construct($attributes = null)
    {
        $this->setLabelImage(new LabelImage());

        if (null !== $attributes) {
            if (isset($attributes->TrackingNumber)) {
                $this->setTrackingNumber($attributes->TrackingNumber);
            }
            if (isset($attributes->LabelImage)) {
                $this->setLabelImage(new LabelImage($attributes->LabelImage));
            }
            if (isset($attributes->Receipt)) {
                $this->setReceipt(new Receipt($attributes->Receipt));
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

        $node = $document->createElement('LabelResults');
        $node->appendChild($document->createElement('TrackingNumber', $this->getTrackingNumber()));
        $node->appendChild($this->getLabelImage()->toNode($document));
        if (null !== $this->getReceipt()) {
            $node->appendChild($this->getReceipt()->toNode($document));
        }
        return $node;
    }

    /**
     * @param string $trackingNumber
     * @return $this
     */
    public function setTrackingNumber($trackingNumber)
    {
        $this->trackingNumber = $trackingNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getTrackingNumber()
    {
        return $this->trackingNumber;
    }

    /**
     * @param \Ups\Entity\LabelRecoveryResponse\LabelImage $labelImage
     * @return $this
     */
    public function setLabelImage($labelImage)
    {
        $this->labelImage = $labelImage;
        return $this;
    }

    /**
     * @return \Ups\Entity\LabelRecoveryResponse\LabelImage
     */
    public function getLabelImage()
    {
        return $this->labelImage;
    }

    /**
     * @param \Ups\Entity\LabelRecoveryResponse\Receipt $receipt
     * @return $this
     */
    public function setReceipt($receipt)
    {
        $this->receipt = $receipt;
        return $this;
    }

    /**
     * @return \Ups\Entity\LabelRecoveryResponse\Receipt
     */
    public function getReceipt()
    {
        return $this->receipt;
    }

}
