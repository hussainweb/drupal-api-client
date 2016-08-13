<?php

namespace Hussainweb\DrupalApi\Tests\Request\Collection;

use Hussainweb\DrupalApi\Request\Collection\CollectionRequest;

class CollectionRequestTest extends \PHPUnit_Framework_TestCase
{

    public function testRequest()
    {
        $req = new CollectionRequest("test.json");
        $this->assertEquals('GET', $req->getMethod());
        $this->assertEquals('test.json', $req->getUri());
        $this->assertEquals('Drupal.org API client (hussainweb/drupal-api-client)', $req->getHeaderLine('User-Agent'));
        $this->assertEquals('application/json', $req->getHeaderLine('Accept'));
    }
}
