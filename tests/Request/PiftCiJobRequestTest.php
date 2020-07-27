<?php

namespace Hussainweb\DrupalApi\Tests\Request;

use Hussainweb\DrupalApi\Request\PiftCiJobRequest;
use PHPUnit\Framework\TestCase;

class PiftCiJobRequestTest extends TestCase
{

    public function testRequest()
    {
        $req = new PiftCiJobRequest(57057);
        $this->assertEquals('https://www.drupal.org/api-d7/pift_ci_job/57057.json', $req->getUri());
    }
}
