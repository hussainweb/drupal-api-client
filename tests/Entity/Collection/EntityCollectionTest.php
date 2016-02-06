<?php

/**
 * @file
 */

namespace Hussainweb\DrupalApi\Tests\Entity\Collection;

use Hussainweb\DrupalApi\Entity\Collection\CommentCollection;
use Hussainweb\DrupalApi\Entity\Collection\EntityCollection;
use Hussainweb\DrupalApi\Entity\Collection\NodeCollection;
use Hussainweb\DrupalApi\Entity\Collection\PiftCiJobCollection;
use Hussainweb\DrupalApi\Entity\Collection\TaxonomyTermCollection;
use Hussainweb\DrupalApi\Entity\Collection\UserCollection;
use Hussainweb\DrupalApi\Entity\Comment;
use Hussainweb\DrupalApi\Entity\Node;
use Hussainweb\DrupalApi\Entity\PiftCiJob;
use Hussainweb\DrupalApi\Entity\TaxonomyTerm;
use Hussainweb\DrupalApi\Entity\User;

class EntityCollectionTest extends \PHPUnit_Framework_TestCase
{

    public function testEntityCollection()
    {
        $raw_data = json_decode(file_get_contents(__DIR__ . '/../../fixtures/comment-collection.json'));
        $collection = $this->getMockForAbstractClass(EntityCollection::class, [
            'raw_data' => $raw_data,
        ]);

        $collection->method('getListItemClass')
            ->willReturn(Comment::class);

        $this->assertEquals("https://www.drupal.org/api-d7/comment.json?page=59345", (string) $collection->getSelfLink());
        $this->assertEquals("https://www.drupal.org/api-d7/comment.json?page=0", (string) $collection->getFirstLink());
        $this->assertEquals("https://www.drupal.org/api-d7/comment.json?page=59344", (string) $collection->getPreviousLink());
        $this->assertEquals("https://www.drupal.org/api-d7/comment.json?page=59346", (string) $collection->getNextLink());
        $this->assertEquals("https://www.drupal.org/api-d7/comment.json?page=59358", (string) $collection->getLastLink());

        foreach ($collection as $id => $item) {
            $this->assertNotEmpty($item->getData()->cid);
        }
    }

    public function testCommentCollection()
    {
        $col = new CommentCollection((object) []);
        $this->assertEquals(Comment::class, $col->getListItemClass());
    }

    public function testNodeCollection()
    {
        $col = new NodeCollection((object) []);
        $this->assertEquals(Node::class, $col->getListItemClass());
    }

    public function testPiftCiJobCollection()
    {
        $col = new PiftCiJobCollection((object) []);
        $this->assertEquals(PiftCiJob::class, $col->getListItemClass());
    }

    public function testTaxonomyTermCollection()
    {
        $col = new TaxonomyTermCollection((object) []);
        $this->assertEquals(TaxonomyTerm::class, $col->getListItemClass());
    }

    public function testUserCollection()
    {
        $col = new UserCollection((object) []);
        $this->assertEquals(User::class, $col->getListItemClass());
    }
}
