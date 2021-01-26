<?php

namespace Hussainweb\DrupalApi\Tests\Entity\Collection;

use GuzzleHttp\Psr7\Response;
use Hussainweb\DrupalApi\Entity\Collection\PagingEntityCollection;
use Hussainweb\DrupalApi\Entity\Comment;
use Hussainweb\DrupalApi\Request\Collection\CollectionRequest;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;

class PagingEntityCollectionTest extends TestCase
{

    public function testPaging()
    {
        $data = json_decode(file_get_contents(__DIR__ . '/../../fixtures/comment-collection-page-0.json'));
        $client = $this->createMock(ClientInterface::class);
        $page1 = json_decode(file_get_contents(
            __DIR__ . '/../../fixtures/comment-collection-page-1.json'
        ));

        // Modify the fixture so there's only two pages.
        unset($page1->next);
        $page1 = json_encode($page1);

        $client->expects($this->once())->method('sendRequest')
        ->willReturn(new Response(
            200,
            ['Content-Type' => 'application/json'],
            $page1
        ));
        $collection = new PagingEntityCollection($data, $client, Comment::class);
        $count = 0;

        /** @var \Hussainweb\DrupalApi\Entity\Comment $comment */
        foreach ($collection as $comment) {
            $count++;
            $this->assertIsInt($comment->getId());
        }

        $this->assertEquals(10, $count);
    }
}
