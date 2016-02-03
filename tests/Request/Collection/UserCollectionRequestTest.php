<?php

/**
 * @file
 */

namespace Hussainweb\DrupalApi\Tests\Request\Collection;

use Hussainweb\DrupalApi\Request\Collection\UserCollectionRequest;

class UserCollectionRequestTest extends \PHPUnit_Framework_TestCase
{

    public function testRequest()
    {
        $req = new UserCollectionRequest();
        $this->assertEquals('https://www.drupal.org/api-d7/user.json', $req->getUri());

        $req = new UserCollectionRequest([
          'page' => 10,
          'limit' => 50,
        ]);
        $this->assertEquals('https://www.drupal.org/api-d7/user.json?page=10&limit=50', $req->getUri());
    }
}
