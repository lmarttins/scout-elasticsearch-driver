<?php

namespace ScoutElastic;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Elasticsearch\ClientBuilder;

class HostElasticServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //
    }

    public function register()
    {
        if (config('scout_elastic.driver') === 'hosts') {
            $this->app->singleton('scout_elastic.client', function () {
                $config = Config::get('scout_elastic.connections.host');
                return ClientBuilder::fromConfig($config);
            });
        }
    }
}