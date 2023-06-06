# Message Broker

Receive messages from a message broker and process them using event listeners.

## Install

First install the latest version of our package.
```bash
composer require tingo-gmbh/message-broker
```

Next we publish config files.
```bash
php artisan vendor:publish --provider="Tingo\MessageBroker\MessageBrokerServiceProvider" --tag="config"
```

## Configuration
Add the following environment variables to your ``.env`` file.

### RabbitMQ
```bash
MESSAGE_BROKER=rabbitmq
MESSAGE_BROKER_HOST=127.0.0.1
MESSAGE_BROKER_PORT=5672
MESSAGE_BROKER_USER=guest
MESSAGE_BROKER_PASSWORD=guest
```

## Usage
Run the following command to start the listener.
```bash
php artisan message-broker:listen --queue=queue_name
```