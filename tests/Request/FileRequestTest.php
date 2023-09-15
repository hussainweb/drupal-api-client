<?php

namespace Hussainweb\DrupalApi\Tests\Request;

use Hussainweb\DrupalApi\Request\FileRequest;
use PHPUnit\Framework\TestCase;

class FileRequestTest extends TestCase
{

    public function testRequest()
    {
        $req = new FileRequest(5_314_867);
        $this->assertEquals('https://www.drupal.org/api-d7/file/5314867.json', $req->getUri());
    }
}
