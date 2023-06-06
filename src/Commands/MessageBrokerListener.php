<?php

namespace Tingo\MessageBrokerListener\Commands;

use Illuminate\Console\Command;

class MessageBrokerListener extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'message-broker-listener:listen';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Receive events from a message broker';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->info('Yeah I am listening');
    }
}