<?php

namespace Hussainweb\DrupalApi\Entity\Collection;

use GuzzleHttp\Psr7\Uri;

/**
 * Trait for relationship links in collections.
 *
 * @see \Hussainweb\DrupalApi\Entity\Collection\EntityCollectionInterface
 */
trait CollectionRelLinkTrait
{

  /**
   * @var \stdClass
   */
    protected $rawData;

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

    public function getLastLink()
    {
        return $this->getRelLink('last');
    }

    public function getNextLink()
    {
        return $this->getRelLink('next');
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
    protected function getRelLink(string $link_name)
    {
        if (!isset($this->rawData->$link_name)) {
            return false;
        }

        $uri = new Uri($this->rawData->$link_name);
        $uri = $uri->withPath($uri->getPath() . '.json');
        return $uri;
    }

}
