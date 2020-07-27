<?php

namespace Hussainweb\DrupalApi\Tests\Request;

use Hussainweb\DrupalApi\Request\TaxonomyTermRequest;
use PHPUnit\Framework\TestCase;

class TaxonomyTermRequestTest extends TestCase
{

    public function testRequest()
    {
        $req = new TaxonomyTermRequest(45);
        $this->assertEquals('https://www.drupal.org/api-d7/taxonomy_term/45.json', $req->getUri());
    }
}
