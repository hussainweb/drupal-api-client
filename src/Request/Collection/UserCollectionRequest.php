<?php

/**
 * @file
 */

namespace Hussainweb\DrupalApi\Request\Collection;

class UserCollectionRequest extends CollectionRequest
{

    public function __construct(array $query = [], array $headers = [])
    {
        $uri = static::DEFAULT_BASE_URI . 'user.json';
        if ($query) {
            $uri .= '?' . http_build_query($query);
        }
        parent::__construct($uri, $headers);
    }
}
