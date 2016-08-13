<?php

namespace Hussainweb\DrupalApi\Tests\Request\Collection;

use Hussainweb\DrupalApi\Request\Collection\PiftCiJobCollectionRequest;

class PiftCiJobCollectionRequestTest extends \PHPUnit_Framework_TestCase
{

    public function testRequest()
    {
        $req = new PiftCiJobCollectionRequest();
        $this->assertEquals('https://www.drupal.org/api-d7/pift_ci_job.json', $req->getUri());

        $req = new PiftCiJobCollectionRequest([
          'page' => 10,
          'limit' => 50,
        ]);
        $this->assertEquals('https://www.drupal.org/api-d7/pift_ci_job.json?page=10&limit=50', $req->getUri());
    }
}
