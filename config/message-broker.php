<?php

return [
    'default' => env('MESSAGE_BROKER', 'rabbitmq'),

    'services' => [
        'rabbitmq' => [
            'host' => env('MESSAGE_BROKER_HOST', 'localhost'),
            'port' => env('MESSAGE_BROKER_PORT', 5672),
            'user' => env('MESSAGE_BROKER_USER', 'guest'),
            'password' => env('MESSAGE_BROKER_PASSWORD', 'guest'),
        ],
    ],
];