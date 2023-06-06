<?php

namespace Tingo\MessageBroker\Messages;

class JsonMessage implements Message
{
    /**
     * @var string
     */
    public string $key;

    /**
     * @var array
     */
    public array $data;

    /**
     * @param  string  $key
     * @param  array  $data
     */
    public function __construct(string $key, array $data)
    {
        $this->key = $key;
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return json_encode([
            'key' => $this->key,
            'data' => $this->data,
        ]);
    }

    /**
     * @param  string  $message
     * @return static
     */
    public static function fromString(string $message): self
    {
        $data = json_decode($message, true);
        if (!$data) {
            return new self('unknown', []);
        }

        return new self($data['key'] ?? 'unknown', $data['data'] ?? []);
    }
}