<?php

namespace Hussainweb\DrupalApi\Tests\Request;

use Hussainweb\DrupalApi\Request\PiftCiJobRequest;

class PiftCiJobRequestTest extends \PHPUnit_Framework_TestCase
{

    public function testRequest()
    {
        $req = new PiftCiJobRequest(57057);
        $this->assertEquals('https://www.drupal.org/api-d7/pift_ci_job/57057.json', $req->getUri());
    }
}
