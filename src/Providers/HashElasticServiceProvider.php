<?php

namespace ScoutElastic\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Elasticsearch\ClientBuilder;

class HashElasticServiceProvider extends ServiceProvider
{
    public function register()
    {
        if (config('scout_elastic.driver') === 'hash') {
            $this->app->singleton('scout_elastic.client', function () {
                $config = Config::get('scout_elastic.connections.hash');
                return ClientBuilder::fromConfig($config);
            });
        }
    }
}
