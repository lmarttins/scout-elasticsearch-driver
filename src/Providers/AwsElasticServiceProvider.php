<?php

namespace ScoutElastic\Providers;

use Illuminate\Support\ServiceProvider;
use Aws\Credentials\CredentialProvider;
use Aws\Credentials\Credentials;
use Aws\ElasticsearchService\ElasticsearchPhpHandler;

class AwsElasticServiceProvider extends ServiceProvider
{
    public function register()
    {
        if (config('scout_elastic.driver') === 'aws') {
            $credentials = new Credentials(
                config('scout_elastic.connections.aws.key'),
                config('scout_elastic.connections.aws.secret')
            );

            $provider = CredentialProvider::fromCredentials($credentials);

            $handler = new ElasticsearchPhpHandler(
                config('scout_elastic.connections.aws.region'),
                $provider
            );

            $this->app->singleton('scout_elastic.client', function () use ($handler) {
                return ElasticBuilder::create()
                    ->setHandler($handler)
                    ->setHosts([config('scout_elastic.connections.aws.hosts')])
                    ->build();
            });
        }
    }
}
