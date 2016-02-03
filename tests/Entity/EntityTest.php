<?php

/**
 * @file
 */

namespace Hussainweb\DrupalApi\Tests\Entity;

use Hussainweb\DrupalApi\Entity\Comment;
use Hussainweb\DrupalApi\Entity\Entity;
use Hussainweb\DrupalApi\Entity\File;
use Hussainweb\DrupalApi\Entity\Node;
use Hussainweb\DrupalApi\Entity\PiftCiJob;
use Hussainweb\DrupalApi\Entity\User;

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

    public function testUserEntity()
    {
        $entity = new User(['test' => 1]);
        $this->assertEquals('uid', $entity->getIdField());
    }

    public function testFileEntity()
    {
        $entity = new File(['test' => 1]);
        $this->assertEquals('fid', $entity->getIdField());
    }

    public function testPiftCiJobEntity()
    {
        $entity = new PiftCiJob(['test' => 1]);
        $this->assertEquals('job_id', $entity->getIdField());
    }
}
