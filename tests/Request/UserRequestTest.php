<?php

namespace Hussainweb\DrupalApi\Tests\Request;

use Hussainweb\DrupalApi\Request\UserRequest;
use PHPUnit\Framework\TestCase;

class UserRequestTest extends TestCase
{

    public function testRequest()
    {
        $req = new UserRequest(314031);
        $this->assertEquals('https://www.drupal.org/api-d7/user/314031.json', $req->getUri());
    }
}
