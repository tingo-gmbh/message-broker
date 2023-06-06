<?php

namespace Tingo\MessageBroker\Broker;

use Illuminate\Support\Facades\Cache;

class FakeMessageBroker implements MessageBroker
{
    /**
     * @return void
     */
    public function listen(): void
    {
        // Do nothing
    }
}