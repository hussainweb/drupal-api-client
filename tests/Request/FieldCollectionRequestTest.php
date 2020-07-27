<?php

namespace Hussainweb\DrupalApi\Tests\Request;

use Hussainweb\DrupalApi\Request\FieldCollectionRequest;
use PHPUnit\Framework\TestCase;

class FieldCollectionRequestTest extends TestCase
{

    public function testRequest()
    {
        $req = new FieldCollectionRequest(434463);
        $this->assertEquals('https://www.drupal.org/api-d7/field_collection_item/434463.json', $req->getUri());
    }
}
