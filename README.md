[![Latest Stable Version](https://poser.pugx.org/thecodingmachine/guzzle-universal-service-provider/v/stable)](https://packagist.org/packages/thecodingmachine/guzzle-universal-service-provider)
[![Latest Unstable Version](https://poser.pugx.org/thecodingmachine/guzzle-universal-service-provider/v/unstable)](https://packagist.org/packages/thecodingmachine/guzzle-universal-service-provider)
[![License](https://poser.pugx.org/thecodingmachine/guzzle-universal-service-provider/license)](https://packagist.org/packages/thecodingmachine/guzzle-universal-service-provider)

# Guzzle6 universal module

This package integrates Guzzle6 in any [container-interop](https://github.com/container-interop/service-provider) compatible framework/container.

## Installation

```
composer require thecodingmachine/guzzle-universal-service-provider
```

Once installed, you need to register the [`TheCodingMachine\Guzzle\XXXServiceProvider`](src/XXXServiceProvider.php) into your container.

If your container supports Puli integration, you have nothing to do. Otherwise, refer to your framework or container's documentation to learn how to register *service providers*.

## Introduction

This is a service provider for [Guzzle 6](http://docs.guzzlephp.org/en/latest/index.html).

In addition to creating services for Guzzle 6, this service provider will also create a [Guzzle 6 adapter for HTTPlug](https://github.com/php-http/httplug).

## Expected values / services

This *service provider* expects the following configuration / services to be available:

| Name                        | Compulsory | Description                            |
|-----------------------------|------------|----------------------------------------|
| `guzzleConfig`       | *no*       | You can change the default provided Guzzle config by override this entry  |


## Provided services

This *service provider* provides the following services:

| Service name                | Description                          |
|-----------------------------|--------------------------------------|
| `GuzzleHttp\Client`              | The Guzzle client                           |
| `guzzleConfig`       | By default, the Guzzle config defaults to: `[ 'http_errors' => true ]` |
| `Http\Adapter\Guzzle6\Client` | An HTTPlug adapter for the Guzzle client |
| `Http\Client\HttpClient` | An alias to the Guzzle6 adapter |
| `Http\Client\HttpAsyncClient` | An alias to the Guzzle6 adapter |

## Extended services

*None*

<small>Project template courtesy of <a href="https://github.com/thecodingmachine/service-provider-template">thecodingmachine/service-provider-template</a></small>
