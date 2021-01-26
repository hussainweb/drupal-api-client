<?php

namespace Hussainweb\DrupalApi\Entity\Collection;

/**
 * Interface representing a collection of entities loaded from drupal.org.
 */
interface EntityCollectionInterface extends \Iterator
{

    /**
     * @return bool|\GuzzleHttp\Psr7\Uri
     */
    public function getSelfLink();

    /**
     * @return bool|\GuzzleHttp\Psr7\Uri
     */
    public function getFirstLink();

    /**
     * @return bool|\GuzzleHttp\Psr7\Uri
     */
    public function getPreviousLink();

    /**
     * @return bool|\GuzzleHttp\Psr7\Uri
     */
    public function getNextLink();

    /**
     * @return bool|\GuzzleHttp\Psr7\Uri
     */
    public function getLastLink();

    /**
     * {@inheritdoc}
     */
    public function current();

    /**
     * {@inheritdoc}
     */
    public function next();

    /**
     * {@inheritdoc}
     */
    public function key();

    /**
     * {@inheritdoc}
     */
    public function valid(): bool;

    /**
     * {@inheritdoc}
     *
     * If a collection does not support rewinding, implement this method with an
     * empty body.
     */
    public function rewind();
}
