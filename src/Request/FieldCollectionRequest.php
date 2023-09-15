<?php

namespace Hussainweb\DrupalApi\Request;

class FieldCollectionRequest extends Request
{
    public function __construct(int $id, array $headers = [])
    {
        $uri = sprintf('%sfield_collection_item/%d.json', Request::DEFAULT_BASE_URI, $id);
        parent::__construct($uri, $headers);
    }
}
