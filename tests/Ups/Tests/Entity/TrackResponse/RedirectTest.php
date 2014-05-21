<?php
namespace Ups\Tests\Entity\TrackResponse;

use DOMDocument;
use Ups;
use PHPUnit_Framework_TestCase;

class  RedirectTest extends PHPUnit_Framework_TestCase
{
    public function testToNode()
    {
        $redirect = new \Ups\Entity\TrackResponse\Redirect();

        $xml = $redirect->toNode();

        $doc = new DOMDocument();
        $doc->loadXML($xml->ownerDocument->saveXML($xml));
        $this->assertTrue($doc->schemaValidate(__DIR__ . '/../../_files/entities/TrackResponse/Redirect.xsd'));
    }
}
