<?php

namespace Hussainweb\DrupalApi\Request;

class PiftCiJobRequest extends Request
{
    public function __construct(int $id, array $headers = [])
    {
        $uri = sprintf('%spift_ci_job/%d.json', Request::DEFAULT_BASE_URI, $id);
        parent::__construct($uri, $headers);
    }
}
