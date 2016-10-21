<?php
declare(strict_types=1);

namespace TheCodingMachine\Guzzle;

use GuzzleHttp\Client as GuzzleClient;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;
use Http\Client\HttpAsyncClient;
use Http\Client\HttpClient;
use Interop\Container\ContainerInterface;
use Interop\Container\Factories\Alias;

class GuzzleServiceProvider implements ServiceProvider
{
    public function getServices()
    {
        return [
            GuzzleClient::class => [ self::class, 'createGuzzleClient' ],
            'guzzleConfig' => [ self::class, 'createGuzzleConfig' ],
            GuzzleAdapter::class => [ self::class, 'createAdapter' ],
            HttpClient::class => new Alias(GuzzleAdapter::class),
            HttpAsyncClient::class => new Alias(GuzzleAdapter::class)
        ];
    }

    public static function createGuzzleClient(ContainerInterface $container) : GuzzleClient
    {
        return new GuzzleClient($container->get('guzzleConfig'));
    }

    public static function createGuzzleConfig() : array
    {
        return [
            'http_errors' => true
        ];
    }

    public static function createAdapter(ContainerInterface $container) : GuzzleAdapter
    {
        return new GuzzleAdapter($container->get(GuzzleClient::class));
    }
}
