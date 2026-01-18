<?php

namespace Secretwebmaster\LaravelCloudflare;

use Illuminate\Support\ServiceProvider;

class CloudflareServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        // Merge package config with app config
        $this->mergeConfigFrom(
            __DIR__.'/../config/cloudflare.php', 'cloudflare'
        );

        // Register the Client as a singleton
        $this->app->singleton(Client::class, function ($app) {
            $config = $app['config']['cloudflare'];

            // Support both API Token and Email + API Key authentication
            return new Client(
                $config['api_token'] ?? null,
                $config['email'] ?? null,
                $config['api_key'] ?? null
            );
        });

        // Register an alias
        $this->app->alias(Client::class, 'cloudflare');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        // Publish config file
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/cloudflare.php' => config_path('cloudflare.php'),
            ], 'cloudflare-config');
        }
    }
}
