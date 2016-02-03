<?php

/**
 * @file
 */

namespace Hussainweb\DrupalApi\Request;

use GuzzleHttp\Psr7\Request as Psr7Request;

class Request extends Psr7Request
{

    const DEFAULT_BASE_URI = 'https://www.drupal.org/api-d7/';

    public function __construct(
        $uri,
        array $headers = []
    ) {
        $method = 'GET';
        $headers += [
            'User-Agent' => 'Drupal Statistics Collector',
            'Accept' => 'application/json',
        ];
        parent::__construct($method, $uri, $headers);
    }
}
