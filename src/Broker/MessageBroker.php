<?php

namespace Tingo\MessageBroker\Broker;

interface MessageBroker
{
    /**
     * @return void
     */
    public function listen(): void;
}