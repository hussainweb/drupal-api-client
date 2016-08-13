<?php

namespace Hussainweb\DrupalApi\Request;

class UserRequest extends Request
{

    public function __construct($id, array $headers = [])
    {
        $uri = sprintf('%suser/%d.json', Request::DEFAULT_BASE_URI, $id);
        parent::__construct($uri, $headers);
    }
}
