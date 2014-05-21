<?php
namespace Ups\Entity\QuantumViewResponse;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

class  FlatFileFormat implements NodeInterface
{
    /**
     * @var string
     */
    private $version;

    /**
     * @var array
     */
    private $file;

    function __construct($attributes = null)
    {

        if (null !== $attributes) {
            if (isset($attributes->Version)) {
                $this->setVersion($attributes->Version);
            }
            if (isset($attributes->File)) {
                $file = $this->getFile();
                foreach ($attributes->File as $item) {
                    $file[] = $item;
                }
                $this->setFile($file);
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

        $node = $document->createElement('FlatFileFormat');
        if (null !== $this->getVersion()) {
            $node->appendChild($document->createElement('Version', $this->getVersion()));
        }
        if (count($this->getFile()) > 0) {
            foreach ($this->getFile() as $File) {
                $node->appendChild($document->createElement('File', $File));
            }
        }
        return $node;
    }

    /**
     * @param string $version
     * @return $this
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param array $file
     * @return $this
     */
    public function setFile($file)
    {
        $this->file = $file;
        return $this;
    }

    /**
     * @return array
     */
    public function getFile()
    {
        return $this->file;
    }

}
