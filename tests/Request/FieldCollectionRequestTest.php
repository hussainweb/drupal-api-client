<?php

/**
 * @file
 */

namespace Hussainweb\DrupalApi\Tests\Request;

use Hussainweb\DrupalApi\Request\FieldCollectionRequest;

class FieldCollectionRequestTest extends \PHPUnit_Framework_TestCase
{

    public function testRequest()
    {
        $req = new FieldCollectionRequest(434463);
        $this->assertEquals('https://www.drupal.org/api-d7/field_collection_item/434463.json', $req->getUri());
    }
}
