<?php

namespace Tingo\MessageBroker\Broker;

class FakeMessageBroker implements MessageBroker
{
    /**
     * @var string
     */
    protected string $queue;

    /**
     * @return void
     */
    public function listen(): void
    {
        // Do nothing
    }

    /**
     * @param  string  $queue
     * @return MessageBroker
     */
    public function setQueue(string $queue): MessageBroker
    {
        $this->queue = $queue;
    }
}