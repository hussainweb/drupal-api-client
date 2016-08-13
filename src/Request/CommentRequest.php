<?php

namespace Hussainweb\DrupalApi\Request;

class CommentRequest extends Request
{

    public function __construct($id, array $headers = [])
    {
        $uri = sprintf('%scomment/%d.json', Request::DEFAULT_BASE_URI, $id);
        parent::__construct($uri, $headers);
    }
}
