# Drupal.org API client

[![Latest Version](https://img.shields.io/github/release/hussainweb/drupal-api-client.svg?style=flat-square)](https://github.com/hussainweb/drupal-api-client/releases)
[![Software License](https://img.shields.io/badge/license-GPLv2-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/hussainweb/drupal-api-client/master.svg?style=flat-square)](https://travis-ci.org/hussainweb/drupal-api-client)
[![Total Downloads](https://img.shields.io/packagist/dt/hussainweb/drupal-api-client.svg?style=flat-square)](https://packagist.org/packages/hussainweb/drupal-api-client)


This is a simple wrapper on Guzzle 6 to access and use the API provided by drupal.org. It was built for [DruStats](https://github.com/hussainweb/drupal-stats) which was built for a developer contest in DrupalCon Asia. You can refer to [DruStats](https://github.com/hussainweb/drupal-stats) for example usage.

## Installation

Use composer to install the package.

```bash
composer require hussainweb/drupal-api-client:"^2.0"
```

Drupal API client version 2+ no longer depends on Guzzle. It can work with any HTTP client that implements a [HTTPlug](https://github.com/php-http/httplug) compatible ClientInterface. Here's a [list of providers](https://packagist.org/providers/php-http/client-implementation).

For example, to use Guzzle, you would need the Guzzle 6 adapter. This will install Guzzle 6 as well.

```bash
composer require php-http/guzzle6-adapter
```

## Usage

The library provides a single client and multiple request classes to send requests to drupal.org API. To send a request, create a request object and call the `getEntity` method on the client class.

```php
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;
use Hussainweb\DrupalApi\Client;
use Hussainweb\DrupalApi\Request\UserRequest;

$config = [
    'timeout' => 2,
    // 'handler' => ...
    // ...
];
$adapter = GuzzleAdapter::createWithConfig($config);

// Retrieve user with uid 314031.
$client = new Client($adapter);
$user_request = new UserRequest('314031');
$user = $client->getEntity($user_request);
```

The above example uses [Guzzle 6 Adapter](http://docs.php-http.org/en/latest/clients/guzzle6-adapter.html) but any HTTP client implementing php-http based clients will work. Construct the HTTP client and pass it when constructing the `Hussainweb\DrupalApi\Client` class.

There are various request classes to retrieve different types of entities and entity listings. Many of the entity request classes have a corresponding list request class as well, e.g. `CommentRequest` and `CommentCollectionRequest`.

### User Agent

In accordance with responsible usage of Drupal.org API, it is important to set the user-agent header to indicate your application. You may set this request once globally using the static property on the `Request` class.

    Request::$userAgent = 'Drupal Statistics Collector';

You have to do this only once as this user-agent is applied to all child requests as well. See the test in `\Hussainweb\DrupalApi\Tests\Request\RequestTest::testRequestUserAgent` for verifying the behaviour.

## Note on HTTP client implementations

As noted above, Drupal API Client version 2+ no longer depends on Guzzle but any HTTP client which provides a [php-http/client-implementation](https://packagist.org/providers/php-http/client-implementation). This is a PSR-18 compatible HTTP client interface and you can read more about it at [HTTPlug](https://github.com/php-http/httplug).

Since PSR-18 has been implemented in a different provider ([psr/http-client-implementation](https://packagist.org/providers/psr/http-client-implementation)), this client might move to that in the near future. Right now, almost all clients that support the HTTPlug interface also supports the PSR-18 interface and you would be able to use that client right now. The only notable exception is Guzzle 7 but there is [discussion to add support for that in an adapter](https://github.com/php-http/guzzle6-adapter/pull/72).
