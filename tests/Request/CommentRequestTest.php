<?php

namespace Hussainweb\DrupalApi\Tests\Request;

use Hussainweb\DrupalApi\Request\CommentRequest;
use PHPUnit\Framework\TestCase;

class CommentRequestTest extends TestCase
{

    public function testRequest()
    {
        $req = new CommentRequest(10_199_115);
        $this->assertEquals('https://www.drupal.org/api-d7/comment/10199115.json', $req->getUri());
    }
}
