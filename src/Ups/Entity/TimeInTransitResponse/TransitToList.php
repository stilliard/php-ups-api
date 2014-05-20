<?php
namespace Ups\Entity\TimeInTransitResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  TransitToList implements NodeInterface
{
    /**
     * @var array
     */
    private $candidate;

    function __construct($attributes = null)
    {
        $this->setCandidate = array();

        if (null !== $attributes) {
            if (isset($attributes->Candidate)) {
                $candidate = $this->getCandidate();
                foreach ($attributes->Candidate as $item) {
                    $candidate[] = new Candidate($item);
                }
                $this->setCandidate($candidate);
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

        $node = $document->createElement('TransitToList');
        if (count($this->getCandidate()) > 0) {
            foreach ($this->getCandidate() as $Candidate) {
                $node->appendChild($Candidate->toNode($document));
            }
        }
        return $node;
    }

    /**
     * @param array $candidate
     * @return $this
     */
    public function setCandidate($candidate)
    {
        $this->candidate = $candidate;
        return $this;
    }

    /**
     * @return array
     */
    public function getCandidate()
    {
        return $this->candidate;
    }

}
