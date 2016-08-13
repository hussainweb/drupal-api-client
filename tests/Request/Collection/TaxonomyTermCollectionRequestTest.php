<?php

namespace Hussainweb\DrupalApi\Tests\Request\Collection;

use Hussainweb\DrupalApi\Request\Collection\TaxonomyTermCollectionRequest;

class TaxonomyTermCollectionRequestTest extends \PHPUnit_Framework_TestCase
{

    public function testRequest()
    {
        $req = new TaxonomyTermCollectionRequest();
        $this->assertEquals('https://www.drupal.org/api-d7/taxonomy_term.json', $req->getUri());

        $req = new TaxonomyTermCollectionRequest([
          'page' => 10,
          'limit' => 50,
        ]);
        $this->assertEquals('https://www.drupal.org/api-d7/taxonomy_term.json?page=10&limit=50', $req->getUri());
    }
}
