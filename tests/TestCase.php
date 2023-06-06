<?php
namespace Tingo\MessageBroker\Tests;

use Tingo\MessageBroker\MessageBrokerServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        // additional setup
    }

    /**
     * @param $app
     * @return string[]
     */
    protected function getPackageProviders($app): array
    {
        return [
            MessageBrokerServiceProvider::class,
        ];
    }

    /**
     * @param $app
     * @return void
     */
    protected function getEnvironmentSetUp($app): void
    {

    }
}