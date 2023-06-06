<?php

namespace Tingo\MessageBroker\Messages;

interface Message
{
    /**
     * @return string
     */
    public function toString(): string;

    /**
     * @param  string  $message
     * @return static
     */
    public static function fromString(string $message): self;
}