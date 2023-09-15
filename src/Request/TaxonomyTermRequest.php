<?php

namespace Hussainweb\DrupalApi\Request;

class TaxonomyTermRequest extends Request
{
    public function __construct(int $id, array $headers = [])
    {
        $uri = sprintf('%staxonomy_term/%d.json', Request::DEFAULT_BASE_URI, $id);
        parent::__construct($uri, $headers);
    }
}
