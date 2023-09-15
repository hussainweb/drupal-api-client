<?php

namespace Hussainweb\DrupalApi\Request\Collection;

class TaxonomyTermCollectionRequest extends CollectionRequest
{
    public function __construct(array $query = [], array $headers = [])
    {
        $uri = static::DEFAULT_BASE_URI . 'taxonomy_term.json';
        if ($query) {
            $uri .= '?' . http_build_query($query);
        }
        parent::__construct($uri, $headers);
    }
}
