# Drupal.org API client

[![Latest Version](https://img.shields.io/github/release/hussainweb/drupal-api-client.svg?style=flat-square)](https://github.com/hussainweb/drupal-api-client/releases)
[![Software License](https://img.shields.io/badge/license-GPLv2-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/hussainweb/drupal-api-client/master.svg?style=flat-square)](https://travis-ci.org/hussainweb/drupal-api-client)
[![Total Downloads](https://img.shields.io/packagist/dt/hussainweb/drupal-api-client.svg?style=flat-square)](https://packagist.org/packages/hussainweb/drupal-api-client)


This is a simple wrapper on Guzzle 6 to access and use the API provided by drupal.org. It was built for [DruStats](https://github.com/hussainweb/drupal-stats) which was built for a developer contest in DrupalCon Asia. You can refer to [DruStats](https://github.com/hussainweb/drupal-stats) for example usage.

## Intallation

Use composer to install the package.

    composer require hussainweb/drupal-api-client:"~1.0"

## Usage

The library provides a single client and multiple request classes to send requests to drupal.org API. To send a request, create a request object and call the `getEntity` method on the client class.

    use Hussainweb\DrupalApi\Client;
    use Hussainweb\DrupalApi\Request\UserRequest;

    // Retrieve user with uid 314031.
    $client = new Client();
    $user_request = new UserRequest('314031');
    $user = $client->getEntity($user_request);

There are various request classes to retrieve different types of entities and entity listings. Many of the entity request classes have a corresponding list request class as well, e.g. `CommentRequest` and `CommentCollectionRequest`.

### User Agent

In accordance with responsible usage of Drupal.org API, it is important to set the user-agent header to indicate your application. You may set this request once globally using the static property on the `Request` class.

    Request::$userAgent = 'Drupal Statistics Collector';

You have to do this only once as this user-agent is applied to all child requests as well. See the test in `\Hussainweb\DrupalApi\Tests\Request\RequestTest::testRequestUserAgent` for verifying the behaviour.
