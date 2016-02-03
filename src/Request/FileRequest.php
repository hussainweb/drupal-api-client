<?php

/**
 * @file
 */

namespace Hussainweb\DrupalApi\Request;

class FileRequest extends Request
{

    public function __construct($id, array $headers = [])
    {
        $uri = sprintf('%sfile/%d.json', Request::DEFAULT_BASE_URI, $id);
        parent::__construct($uri, $headers);
    }
}
