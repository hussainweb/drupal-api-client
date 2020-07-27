<?php

namespace Hussainweb\DrupalApi\Request;

use GuzzleHttp\Psr7\Request as Psr7Request;

class Request extends Psr7Request
{

    public const DEFAULT_BASE_URI = 'https://www.drupal.org/api-d7/';

    /**
     * The user agent to use when sending the request.
     *
     * @var string
     */
    public static $userAgent = 'Drupal.org API client (hussainweb/drupal-api-client)';

    public function __construct(
        string $uri,
        array $headers = []
    ) {
        $method = 'GET';
        $headers += [
            'User-Agent' => static::$userAgent,
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
    public function getEntityClass(): string
    {
        $class = static::class;
        $class = str_replace('Hussainweb\\DrupalApi\\Request\\', 'Hussainweb\\DrupalApi\\Entity\\', $class);
        $class = substr($class, 0, strlen($class) - 7);
        return $class;
    }
}
