<?php
namespace Ups\Entity\LabelRecoveryRequest;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  LabelDelivery implements NodeInterface
{
    /**
     * @var \Ups\Entity\LabelRecoveryRequest\LabelLinkIndicator
     */
    private $labelLinkIndicator;

    /**
     * @var \Ups\Entity\LabelRecoveryRequest\ResendEMailIndicator
     */
    private $resendEMailIndicator;

    /**
     * @var \Ups\Entity\LabelRecoveryRequest\EMailMessage
     */
    private $eMailMessage;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->LabelLinkIndicator)) {
                $this->setLabelLinkIndicator(new LabelLinkIndicator($attributes->LabelLinkIndicator));
            }
            if (isset($attributes->ResendEMailIndicator)) {
                $this->setResendEMailIndicator(new ResendEMailIndicator($attributes->ResendEMailIndicator));
            }
            if (isset($attributes->EMailMessage)) {
                $this->setEMailMessage(new EMailMessage($attributes->EMailMessage));
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

        $node = $document->createElement('LabelDelivery');
        if (null !== $this->getLabelLinkIndicator()) {
            $node->appendChild($this->getLabelLinkIndicator()->toNode($document));
        }
        if (null !== $this->getResendEMailIndicator()) {
            $node->appendChild($this->getResendEMailIndicator()->toNode($document));
        }
        if (null !== $this->getEMailMessage()) {
            $node->appendChild($this->getEMailMessage()->toNode($document));
        }
        return $node;
    }

    /**
     * @param \Ups\Entity\LabelRecoveryRequest\LabelLinkIndicator $labelLinkIndicator
     * @return $this
     */
    public function setLabelLinkIndicator($labelLinkIndicator)
    {
        $this->labelLinkIndicator = $labelLinkIndicator;
        return $this;
    }

    /**
     * @return \Ups\Entity\LabelRecoveryRequest\LabelLinkIndicator
     */
    public function getLabelLinkIndicator()
    {
        return $this->labelLinkIndicator;
    }

    /**
     * @param \Ups\Entity\LabelRecoveryRequest\ResendEMailIndicator $resendEMailIndicator
     * @return $this
     */
    public function setResendEMailIndicator($resendEMailIndicator)
    {
        $this->resendEMailIndicator = $resendEMailIndicator;
        return $this;
    }

    /**
     * @return \Ups\Entity\LabelRecoveryRequest\ResendEMailIndicator
     */
    public function getResendEMailIndicator()
    {
        return $this->resendEMailIndicator;
    }

    /**
     * @param \Ups\Entity\LabelRecoveryRequest\EMailMessage $eMailMessage
     * @return $this
     */
    public function setEMailMessage($eMailMessage)
    {
        $this->eMailMessage = $eMailMessage;
        return $this;
    }

    /**
     * @return \Ups\Entity\LabelRecoveryRequest\EMailMessage
     */
    public function getEMailMessage()
    {
        return $this->eMailMessage;
    }

}
