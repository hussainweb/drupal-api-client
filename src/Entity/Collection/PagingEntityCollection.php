<?php

declare(strict_types=1);

namespace Hussainweb\DrupalApi\Entity\Collection;

use Hussainweb\DrupalApi\Request\Request;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Serializer\Encoder\JsonDecode;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

/**
 * A collection of entities loaded from drupal.org that supports automatic
 * forward-paging.
 */
class PagingEntityCollection implements EntityCollectionInterface
{
    use CollectionRelLinkTrait;

    private $iteratorPosition = 0;

    /**
     * @var \stdClass
     */
    protected $rawData;

    /**
     * @var \Psr\Http\Client\ClientInterface
     */
    private $client;

    /**
     * @var string
     */
    private $listItemClass;

    /**
     * PagingEntityCollection constructor.
     *
     * @param \stdClass $data
     *   The data with the first page response.
     * @param \Psr\Http\Client\ClientInterface $client
     *   The HTTP client used to fetch subsequent pages.
     * @param string $listItemClass
     *   The list item class FQCN to deserialize entities into.
     */
    final public function __construct(
        \stdClass $data,
        ClientInterface $client,
        string $listItemClass
    ) {
        $this->rawData = $data;
        $this->client = $client;
        $this->listItemClass = $listItemClass;
    }

    /**
     * Construct the object from a HTTP Response.
     *
     * @param \Psr\Http\Message\ResponseInterface $response
     *   Response object to parse.
     * @param \Psr\Http\Client\ClientInterface $client
     *   The HTTP client used to fetch subsequent pages.
     * @param string $listItemClass
     *   The list item class FQCN to deserialize entities into.
     *
     * @return static
     *   The EntityCollection object for the response.
     */
    public static function fromResponse(
        ResponseInterface $response,
        ClientInterface $client,
        string $listItemClass
    ): self {
        return new static(
            (new JsonDecode())->decode(
                (string) $response->getBody(),
                JsonEncoder::FORMAT
            ),
            $client,
            $listItemClass
        );
    }

    public function current()
    {
        return new $this->listItemClass(
            $this->rawData->list[$this->iteratorPosition]
        );
    }

    public function next()
    {
        ++$this->iteratorPosition;
    }

    public function key()
    {
        return $this->iteratorPosition;
    }

    public function valid(): bool
    {
        $valid = isset($this->rawData->list[$this->iteratorPosition]);
        if (!$valid && $this->getNextLink()) {
            $request = new Request((string) $this->getNextLink());
            $response = $this->client->sendRequest($request);
            $this->rawData = (new JsonDecode())->decode(
                (string) $response->getBody(),
                JsonEncoder::FORMAT
            );
            $this->iteratorPosition = 0;
            $valid = true;
        }

        return $valid;
    }

    public function rewind()
    {
        // We do not allow rewinding as that could force us to go back and reload a
        // previously loaded page.
    }
}
