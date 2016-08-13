<?php

namespace Hussainweb\DrupalApi\Tests\Request;

use Hussainweb\DrupalApi\Request\CommentRequest;

class CommentRequestTest extends \PHPUnit_Framework_TestCase
{

    public function testRequest()
    {
        $req = new CommentRequest(10199115);
        $this->assertEquals('https://www.drupal.org/api-d7/comment/10199115.json', $req->getUri());
    }
}
