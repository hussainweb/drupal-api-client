<?php

namespace Hussainweb\DrupalApi\Tests\Request;

use Hussainweb\DrupalApi\Request\Request;

class RequestTest extends \PHPUnit_Framework_TestCase
{

    public function testRequest()
    {
        $req = new Request("test.json");
        $this->assertEquals('GET', $req->getMethod());
        $this->assertEquals('test.json', $req->getUri());
        $this->assertEquals('Drupal.org API client (hussainweb/drupal-api-client)', $req->getHeaderLine('User-Agent'));
        $this->assertEquals('application/json', $req->getHeaderLine('Accept'));
    }

    public function testRequestWithHeaders()
    {
        $req = new Request("test.json", [
            'User-Agent' => 'Drupal Statistics Collector Test Suite',
            'Accept' => 'application/hal+json',
        ]);
        $this->assertEquals('Drupal Statistics Collector Test Suite', $req->getHeaderLine('User-Agent'));
        $this->assertEquals('application/hal+json', $req->getHeaderLine('Accept'));
    }

    public function testRequestUserAgent()
    {
        Request::$userAgent = 'Drupal.org API client Test Suite';
        $req = new Request("test.json");
        $this->assertEquals('Drupal.org API client Test Suite', $req->getHeaderLine('User-Agent'));
    }
}
