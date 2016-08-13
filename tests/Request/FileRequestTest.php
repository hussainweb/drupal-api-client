<?php

namespace Hussainweb\DrupalApi\Tests\Request;

use Hussainweb\DrupalApi\Request\FileRequest;

class FileRequestTest extends \PHPUnit_Framework_TestCase
{

    public function testRequest()
    {
        $req = new FileRequest(5314867);
        $this->assertEquals('https://www.drupal.org/api-d7/file/5314867.json', $req->getUri());
    }
}
