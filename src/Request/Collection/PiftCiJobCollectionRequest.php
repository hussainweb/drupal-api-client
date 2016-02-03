<?php

/**
 * @file
 */

namespace Hussainweb\DrupalApi\Request\Collection;

class PiftCiJobCollectionRequest extends CollectionRequest
{

    public function __construct(array $query = [], array $headers = [])
    {
        $uri = static::DEFAULT_BASE_URI . 'pift_ci_job.json';
        if ($query) {
            $uri .= '?' . http_build_query($query);
        }
        parent::__construct($uri, $headers);
    }
}
