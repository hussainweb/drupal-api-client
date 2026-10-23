# Drupal.org API client

[![Latest Version](https://img.shields.io/github/release/hussainweb/drupal-api-client.svg?style=flat-square)](https://github.com/hussainweb/drupal-api-client/releases)
[![Software License](https://img.shields.io/badge/license-GPLv2-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/hussainweb/drupal-api-client/main.svg?style=flat-square)](https://travis-ci.org/hussainweb/drupal-api-client)
[![Total Downloads](https://img.shields.io/packagist/dt/hussainweb/drupal-api-client.svg?style=flat-square)](https://packagist.org/packages/hussainweb/drupal-api-client)


This is a simple wrapper on Guzzle 6 to access and use the API provided by drupal.org. It was built for [DruStats](https://github.com/hussainweb/drupal-stats) which was built for a developer contest in DrupalCon Asia. You can refer to [DruStats](https://github.com/hussainweb/drupal-stats) for example usage.

## Installation

Use composer to install the package.

```bash
composer require hussainweb/drupal-api-client:"^2.0"
```

Drupal API client version 2+ does not depend on a specific HTTP client. It works with any [PSR-18](https://www.php-fig.org/psr/psr-18/) HTTP client. Here's a [list of providers](https://packagist.org/providers/psr/http-client-implementation).

For example, Guzzle 7 and later implement PSR-18 directly, so you can pass a `GuzzleHttp\Client` without any adapter.

```bash
composer require guzzlehttp/guzzle
```

## Usage

The library provides a single client and multiple request classes to send requests to drupal.org API. To send a request, create a request object and call the `getEntity` method on the client class.

```php
use GuzzleHttp\Client as GuzzleClient;
use Hussainweb\DrupalApi\Client;
use Hussainweb\DrupalApi\Request\UserRequest;

$http_client = new GuzzleClient(['timeout' => 2]);

// Retrieve user with uid 314031.
$client = new Client($http_client);
$user_request = new UserRequest('314031');
$user = $client->getEntity($user_request);
```

Any PSR-18 HTTP client will work. Construct the HTTP client and pass it when constructing the `Hussainweb\DrupalApi\Client` class.

## Note on HTTP client implementations

Version 2.3 and later require any [psr/http-client-implementation](https://packagist.org/providers/psr/http-client-implementation). Earlier 2.x versions required `php-http/client-implementation` (HTTPlug), which blocked Guzzle 8 and Drupal 12, so a Guzzle adapter is no longer needed.
