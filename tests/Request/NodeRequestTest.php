<?php

namespace Hussainweb\DrupalApi\Tests\Request;

use Hussainweb\DrupalApi\Entity\Node;
use Hussainweb\DrupalApi\Request\NodeRequest;
use PHPUnit\Framework\TestCase;

class NodeRequestTest extends TestCase
{

    public function testRequest()
    {
        $req = new NodeRequest(3060);
        $this->assertEquals('https://www.drupal.org/api-d7/node/3060.json', $req->getUri());
    }

    public function testRequestEntityClass()
    {
        $req = new NodeRequest(3060);
        $this->assertEquals(Node::class, $req->getEntityClass());
    }
}
