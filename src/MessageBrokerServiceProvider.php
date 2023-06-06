<?php

namespace Tingo\MessageBroker;

use Illuminate\Support\ServiceProvider;
use Tingo\MessageBroker\Commands\MessageBrokerListener;

class MessageBrokerServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/message-broker.php', 'message-broker');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            // Publish config file.
            $this->publishes([
                __DIR__ . '/../config/message-broker.php' => config_path('message-broker.php'),
            ], 'config');

            // Register commands
            $this->commands(
                commands: [
                    MessageBrokerListener::class,
                ],
            );
        }
    }
}