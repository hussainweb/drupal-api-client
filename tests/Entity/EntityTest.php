<?php

namespace Hussainweb\DrupalApi\Tests\Entity;

use Hussainweb\DrupalApi\Entity\Comment;
use Hussainweb\DrupalApi\Entity\Entity;
use Hussainweb\DrupalApi\Entity\FieldCollection;
use Hussainweb\DrupalApi\Entity\File;
use Hussainweb\DrupalApi\Entity\Node;
use Hussainweb\DrupalApi\Entity\PiftCiJob;
use Hussainweb\DrupalApi\Entity\TaxonomyTerm;
use Hussainweb\DrupalApi\Entity\User;

class EntityTest extends \PHPUnit_Framework_TestCase
{

    public function testEntity()
    {
        $entity = $this->getMockForAbstractClass(Entity::class, [
            'raw_data' => (object) ['test' => 1],
        ]);
        $entity->method('getIdField')
            ->willReturn('test');
        $entity->method('getIntegerFields')
            ->willReturn(['test']);

        $this->assertEquals((object) ['test' => 1], $entity->getData());
        $this->assertEquals(1, $entity->getId());

        $this->assertEquals(1, $entity->test);
        $entity->test = 2;
        $this->assertEquals(2, $entity->getId());
        $this->assertEquals(2, $entity->test);

        $this->assertFalse(isset($entity->id));
        $this->assertTrue(isset($entity->test));
    }

    public function testNodeEntity()
    {
        $entity = new Node(['test' => 1, 'nid' => '2', 'vid' => '3']);
        $this->assertEquals('nid', $entity->getIdField());
        $this->assertSame(2, $entity->getId());
        $this->assertNotSame('2', $entity->getData()->nid);
        $this->assertSame(3, $entity->getData()->vid);
    }

    public function testTaxonomyTermEntity()
    {
        $entity = new TaxonomyTerm(['test' => 1, 'tid' => '2']);
        $this->assertEquals('tid', $entity->getIdField());
        $this->assertNotSame('2', $entity->getData()->tid);
    }

    public function testCommentEntity()
    {
        $entity = new Comment(['test' => 1, 'cid' => '2']);
        $this->assertEquals('cid', $entity->getIdField());
        $this->assertNotSame('2', $entity->getData()->cid);
    }

    public function testUserEntity()
    {
        $entity = new User(['test' => 1, 'uid' => '2']);
        $this->assertEquals('uid', $entity->getIdField());
        $this->assertNotSame('2', $entity->getData()->uid);
    }

    public function testFileEntity()
    {
        $entity = new File(['test' => 1, 'fid' => '2']);
        $this->assertEquals('fid', $entity->getIdField());
        $this->assertNotSame('2', $entity->getData()->fid);
    }

    public function testPiftCiJobEntity()
    {
        $entity = new PiftCiJob(['test' => 1, 'job_id' => '2']);
        $this->assertEquals('job_id', $entity->getIdField());
        $this->assertNotSame('2', $entity->getData()->job_id);
    }

    public function testFieldCollectionEntity()
    {
        $entity = new FieldCollection(['test' => 1, 'item_id' => '2']);
        $this->assertEquals('item_id', $entity->getIdField());
        $this->assertNotSame('2', $entity->getData()->item_id);
    }
}
