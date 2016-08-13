<?php

namespace Hussainweb\DrupalApi\Tests\Request;

use Hussainweb\DrupalApi\Request\UserRequest;

class UserRequestTest extends \PHPUnit_Framework_TestCase
{

    public function testRequest()
    {
        $req = new UserRequest(314031);
        $this->assertEquals('https://www.drupal.org/api-d7/user/314031.json', $req->getUri());
    }
}
