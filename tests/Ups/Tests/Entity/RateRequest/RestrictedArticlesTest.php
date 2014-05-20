<?php
namespace Ups\Tests\Entity\RateRequest;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  RestrictedArticlesTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $restrictedArticles = new \Ups\Entity\RateRequest\RestrictedArticles();

        $xml = $restrictedArticles->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/RateRequest/RestrictedArticles.xsd'));
    }
}
