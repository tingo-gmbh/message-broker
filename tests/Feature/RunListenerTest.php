<?php

namespace Tingo\MessageBroker\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tingo\MessageBroker\Broker\FakeMessageBroker;
use Tingo\MessageBroker\Tests\TestCase;

class RunListenerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @group default
     */
    public function testParseMessage()
    {
        $spy = $this->spy(FakeMessageBroker::class);

        Artisan::call('message-broker:listen');

        $spy->shouldHaveReceived('listen');
    }
}