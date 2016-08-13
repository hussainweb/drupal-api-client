<?php

namespace Hussainweb\DrupalApi\Tests\Request;

use Hussainweb\DrupalApi\Request\TaxonomyTermRequest;

class TaxonomyTermRequestTest extends \PHPUnit_Framework_TestCase
{

    public function testRequest()
    {
        $req = new TaxonomyTermRequest(45);
        $this->assertEquals('https://www.drupal.org/api-d7/taxonomy_term/45.json', $req->getUri());
    }
}
