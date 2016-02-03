<?php

/**
 * @file
 */

namespace Hussainweb\DrupalApi\Tests\Entity;

use Hussainweb\DrupalApi\Entity\Comment;
use Hussainweb\DrupalApi\Entity\Entity;
use Hussainweb\DrupalApi\Entity\Node;

class EntityTest extends \PHPUnit_Framework_TestCase
{

    public function testEntity()
    {
        $entity = $this->getMockForAbstractClass(Entity::class, [
            'raw_data' => ['test' => 1],
        ]);

        $this->assertEquals(['test' => 1], $entity->getData());
    }

    public function testNodeEntity()
    {
        $entity = new Node(['test' => 1]);
        $this->assertEquals('nid', $entity->getIdField());
    }

    public function testCommentEntity()
    {
        $entity = new Comment(['test' => 1]);
        $this->assertEquals('cid', $entity->getIdField());
    }
}
