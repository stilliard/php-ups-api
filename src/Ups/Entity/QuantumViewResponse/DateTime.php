<?php
namespace Ups\Entity\QuantumViewResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  DateTime implements NodeInterface
{
    /**
     * @var string
     */
    private $beginDate;

    /**
     * @var string
     */
    private $endDate;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->BeginDate)) {
                $this->setBeginDate($attributes->BeginDate);
            }
            if (isset($attributes->EndDate)) {
                $this->setEndDate($attributes->EndDate);
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

        $node = $document->createElement('DateTime');
        $node->appendChild($document->createElement('BeginDate', $this->getBeginDate()));
        if (null !== $this->getEndDate()) {
            $node->appendChild($document->createElement('EndDate', $this->getEndDate()));
        }
        return $node;
    }

    /**
     * @param string $beginDate
     * @return $this
     */
    public function setBeginDate($beginDate)
    {
        $this->beginDate = $beginDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getBeginDate()
    {
        return $this->beginDate;
    }

    /**
     * @param string $endDate
     * @return $this
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

}
