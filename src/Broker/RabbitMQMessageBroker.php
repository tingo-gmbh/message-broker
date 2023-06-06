<?php

namespace Tingo\MessageBroker\Broker;

use ErrorException;
use Exception;
use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Wire\AMQPTable;
use Tingo\MessageBroker\Messages\JsonMessage;

class RabbitMQMessageBroker implements MessageBroker
{

    /**
     * @var AMQPStreamConnection
     */
    protected AMQPStreamConnection $connection;

    /**
     * @var AMQPChannel
     */
    protected AMQPChannel $channel;

    /**
     * @var string
     */
    protected string $queue = 'default';

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->connection = new AMQPStreamConnection(
            config('message-broker.services.rabbitmq.host'),
            config('message-broker.services.rabbitmq.port'),
            config('message-broker.services.rabbitmq.user'),
            config('message-broker.services.rabbitmq.password')
        );
        $this->channel = $this->connection->channel();
    }

    /**
     * @param  string  $queue
     * @return $this
     */
    public function setQueue(string $queue): self
    {
        $this->queue = $queue;
        return $this;
    }

    /**
     * @return void
     * @throws ErrorException
     * @throws Exception
     */
    public function listen(): void
    {
        $this->queueDeclare();

        echo " [*] Waiting for messages. To exit press CTRL+C\n";

        $this->channel->basic_qos(0, 1, 0);
        $this->channel->basic_consume(
            $this->queue,
            '',
            false,
            false,
            false,
            false,
            function ($msg) {
                $message = JsonMessage::fromString($msg->body);
                echo ' [x] Received key=', $message->key, ', message = ', json_encode($message->data), "\n";
                $msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
            },
        );

        while ($this->channel->is_open()) {
            $this->channel->wait();
        }

        $this->channel->close();
    }

    /**
     * Declare queue.
     *
     * @return void
     */
    protected function queueDeclare(): void
    {
        $this->channel->queue_declare(
            $this->queue,
            false,
            true,
            false,
            false,
            false,
            new AMQPTable(['x-queue-type' => 'quorum'])
        );
    }
}