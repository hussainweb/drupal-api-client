<?php

/**
 * @file
 */

namespace Hussainweb\DrupalApi\Tests\Entity\Collection;

use Hussainweb\DrupalApi\Entity\Collection\EntityCollection;
use Hussainweb\DrupalApi\Entity\Comment;

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
}
