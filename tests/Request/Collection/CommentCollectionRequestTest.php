<?php

/**
 * @file
 */

namespace Hussainweb\DrupalApi\Tests\Request\Collection;

use Hussainweb\DrupalApi\Request\Collection\CommentCollectionRequest;

class CommentCollectionRequestTest extends \PHPUnit_Framework_TestCase
{

    public function testRequest()
    {
        $req = new CommentCollectionRequest();
        $this->assertEquals('https://www.drupal.org/api-d7/comment.json', $req->getUri());

        $req = new CommentCollectionRequest([
          'page' => 10,
          'limit' => 50,
        ]);
        $this->assertEquals('https://www.drupal.org/api-d7/comment.json?page=10&limit=50', $req->getUri());
    }
}
