<?php

namespace Hussainweb\DrupalApi\Request;

class NodeRequest extends Request
{
    public function __construct(int $id, array $headers = [])
    {
        $uri = sprintf('%snode/%d.json', Request::DEFAULT_BASE_URI, $id);
        parent::__construct($uri, $headers);
    }
}
