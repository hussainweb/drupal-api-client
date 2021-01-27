<?php

namespace Hussainweb\DrupalApi\Tests\Entity\Collection;

use GuzzleHttp\Psr7\Response;
use Hussainweb\DrupalApi\Client;
use Hussainweb\DrupalApi\Entity\Collection\CommentCollection;
use Hussainweb\DrupalApi\Entity\Collection\PagingEntityCollection;
use Hussainweb\DrupalApi\Entity\Comment;
use Hussainweb\DrupalApi\Request\Collection\CommentCollectionRequest;
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

    public function testFromClient()
    {
        $data = json_decode(file_get_contents(__DIR__ . '/../../fixtures/comment-collection-page-0.json'));
        /** @var \Hussainweb\DrupalApi\Client|\PHPUnit\Framework\MockObject\MockObject $client */
        $client = $this->createMock(Client::class);
        $page1 = json_decode(file_get_contents(
            __DIR__ . '/../../fixtures/comment-collection-page-1.json'
        ));

        // Modify the fixture so there's only two pages.
        unset($page1->next);
        $page1 = json_encode($page1);

        $comment_collection = new CommentCollection($data);
        $client->expects($this->once())->method('getEntity')
            ->willReturn($comment_collection);

        $request = new CommentCollectionRequest();
        $entity_collection = $client->getEntity($request);

        $http_client = $this->createMock(ClientInterface::class);
        $http_client->expects($this->once())->method('sendRequest')
            ->willReturn(new Response(200, ['Content-Type' => 'application/json'], $page1));
        $paging_collection = $entity_collection->toPagingEntityCollection($http_client);
        $count = 0;
        foreach ($paging_collection as $comment) {
            $count++;
            $this->assertInstanceOf(Comment::class, $comment);
        }

        $this->assertEquals(10, $count);
    }
}
