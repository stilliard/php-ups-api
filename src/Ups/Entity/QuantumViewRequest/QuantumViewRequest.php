<?php
namespace Ups\Entity\QuantumViewRequest;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  QuantumViewRequest implements NodeInterface
{
    /**
     * @var \Ups\Entity\QuantumViewRequest\Request
     */
    private $request;

    /**
     * @var array
     */
    private $subscriptionRequest;

    /**
     * @var string
     */
    private $bookmark;

    function __construct($attributes = null)
    {
        $this->setRequest(new Request());

        if (null !== $attributes) {
            if (isset($attributes->Request)) {
                $this->setRequest(new Request($attributes->Request));
            }
            if (isset($attributes->SubscriptionRequest)) {
                $subscriptionRequest = $this->getSubscriptionRequest();
                foreach ($attributes->SubscriptionRequest as $item) {
                    $subscriptionRequest[] = new SubscriptionRequest($item);
                }
                $this->setSubscriptionRequest($subscriptionRequest);
            }
            if (isset($attributes->Bookmark)) {
                $this->setBookmark($attributes->Bookmark);
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

        $node = $document->createElement('QuantumViewRequest');
        $node->appendChild($this->getRequest()->toNode($document));
        if (null !== $this->getSubscriptionRequest()) {
            if (count($this->getSubscriptionRequest()) > 0) {
                foreach ($this->getSubscriptionRequest() as $SubscriptionRequest) {
                    $node->appendChild($SubscriptionRequest->toNode($document));
                }
            }
        }
        if (null !== $this->getBookmark()) {
            $node->appendChild($document->createElement('Bookmark', $this->getBookmark()));
        }
        return $node;
    }

    /**
     * @param \Ups\Entity\QuantumViewRequest\Request $request
     * @return $this
     */
    public function setRequest($request)
    {
        $this->request = $request;
        return $this;
    }

    /**
     * @return \Ups\Entity\QuantumViewRequest\Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param array $subscriptionRequest
     * @return $this
     */
    public function setSubscriptionRequest($subscriptionRequest)
    {
        $this->subscriptionRequest = $subscriptionRequest;
        return $this;
    }

    /**
     * @return array
     */
    public function getSubscriptionRequest()
    {
        return $this->subscriptionRequest;
    }

    /**
     * @param string $bookmark
     * @return $this
     */
    public function setBookmark($bookmark)
    {
        $this->bookmark = $bookmark;
        return $this;
    }

    /**
     * @return string
     */
    public function getBookmark()
    {
        return $this->bookmark;
    }

}
