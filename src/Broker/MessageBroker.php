<?php

namespace Tingo\MessageBroker\Broker;

interface MessageBroker
{
    /**
     * @return void
     */
    public function listen(): void;

    /**
     * @param  string  $queue
     * @return $this
     */
    public function setQueue(string $queue): self;
}