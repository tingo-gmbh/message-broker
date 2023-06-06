<?php

namespace Tingo\MessageBrokerListener;

use Illuminate\Support\ServiceProvider;
use Tingo\MessageBrokerListener\Commands\MessageBrokerListener;

class MessageBrokerListenerProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/message-broker-listener.php', 'message-broker-listener');
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
                __DIR__ . '/../config/message-broker-listener.php' => config_path('message-broker-listener.php'),
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