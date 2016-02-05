<?php

/**
 * @file
 */

namespace Hussainweb\DrupalApi\Entity\Collection;

use GuzzleHttp\Psr7\Uri;

abstract class EntityCollection implements \Iterator
{

    private $iteratorPosition = 0;

    /**
     * @var array
     */
    protected $rawData;

    public function __construct($data)
    {
        $this->rawData = $data;
    }

    public function getSelfLink()
    {
        return $this->getRelLink('self');
    }

    public function getFirstLink()
    {
        return $this->getRelLink('first');
    }

    public function getPreviousLink()
    {
        return $this->getRelLink('prev');
    }

    public function getNextLink()
    {
        return $this->getRelLink('next');
    }

    public function getLastLink()
    {
        return $this->getRelLink('last');
    }

    /**
     * Get the related link.
     *
     * @param string $link_name
     *   The name of the related link to retrieve.
     *
     * @return bool|\Psr\Http\Message\UriInterface
     *   The related URL or FALSE if not present.
     */
    protected function getRelLink($link_name)
    {
        if (!isset($this->rawData->$link_name)) {
            return false;
        }

        $uri = new Uri($this->rawData->$link_name);
        $uri = $uri->withPath($uri->getPath() . '.json');
        return $uri;
    }

    /**
     * Get the name of the class for a list item.
     *
     * @return string
     *   The name of the class to represent the response.
     */
    abstract public function getListItemClass();

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
}
