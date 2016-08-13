<?php

namespace Hussainweb\DrupalApi\Request\Collection;

class CommentCollectionRequest extends CollectionRequest
{

    public function __construct(array $query = [], array $headers = [])
    {
        $uri = static::DEFAULT_BASE_URI . 'comment.json';
        if ($query) {
            $uri .= '?' . http_build_query($query);
        }
        parent::__construct($uri, $headers);
    }
}
