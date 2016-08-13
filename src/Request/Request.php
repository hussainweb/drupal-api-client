<?php

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

    /**
     * Get the class that can hold the response for this request.
     *
     * @return string
     *   The name of the class.
     */
    public function getEntityClass()
    {
        $class = static::class;
        $class = str_replace('Hussainweb\\DrupalApi\\Request\\', 'Hussainweb\\DrupalApi\\Entity\\', $class);
        $class = substr($class, 0, strlen($class) - 7);
        return $class;
    }
}
