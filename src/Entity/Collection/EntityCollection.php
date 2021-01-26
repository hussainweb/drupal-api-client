<?php

namespace Hussainweb\DrupalApi\Entity\Collection;

use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Serializer\Encoder\JsonDecode;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

abstract class EntityCollection implements \Iterator, \Countable
{
    use CollectionRelLinkTrait;

    private $iteratorPosition = 0;

    /**
     * @var \stdClass
     */
    protected $rawData;

    final public function __construct($data)
    {
        $this->rawData = $data;
    }

    /**
     * Construct the object from a HTTP Response.
     *
     * @param \Psr\Http\Message\ResponseInterface $response
     *   Response object to parse.
     *
     * @return static
     *   The EntityCollection object for the response.
     */
    public static function fromResponse(ResponseInterface $response)
    {
        return new static((new JsonDecode())->decode((string) $response->getBody(), JsonEncoder::FORMAT));
    }

    /**
     * Get the name of the class for a list item.
     *
     * @return string
     *   The name of the class to represent the response.
     */
    abstract public function getListItemClass(): string;

    /**
     * {@inheritdoc}
     */
    public function current()
    {
        $class = $this->getListItemClass();
        return new $class($this->rawData->list[$this->iteratorPosition]);
    }

    /**
     * {@inheritdoc}
     */
    public function next()
    {
        ++$this->iteratorPosition;
    }

    /**
     * {@inheritdoc}
     */
    public function key()
    {
        return $this->iteratorPosition;
    }

    /**
     * {@inheritdoc}
     */
    public function valid()
    {
        return isset($this->rawData->list[$this->iteratorPosition]);
    }

    /**
     * {@inheritdoc}
     */
    public function rewind()
    {
        $this->iteratorPosition = 0;
    }

    /**
     * {@inheritdoc}
     */
    public function count()
    {
        return count($this->rawData->list);
    }
}
