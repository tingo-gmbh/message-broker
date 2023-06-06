<?php

namespace Tingo\MessageBroker\Commands;

use Illuminate\Console\Command;
use Tingo\MessageBroker\Broker\MessageBroker;

class MessageBrokerListener extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'message-broker:listen';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Receive events from a message broker';

    /**
     * Execute the console command.
     */
    public function handle(MessageBroker $messageBroker): void
    {
        $this->info('Start listening...');

        $messageBroker->listen();
    }
}