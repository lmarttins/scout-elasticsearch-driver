<?php

return [
    'driver' => env('ELASTIC_DRIVER', 'hash'),
    'update_mapping' => env('SCOUT_ELASTIC_UPDATE_MAPPING', true),
    'indexer' => env('SCOUT_ELASTIC_INDEXER', 'single'),
    'document_refresh' => env('SCOUT_ELASTIC_DOCUMENT_REFRESH'),
    'connections' => [
        'hash' => [
            'hosts' => [
                env('SCOUT_ELASTIC_HOST', 'localhost:9200')
            ]
        ],
        'aws' => [
            'key' => env('SCOUT_ELASTIC_CLIENT_AWS_KEY'),
            'secret' => env('SCOUT_ELASTIC_CLIENT_AWS_SECRET'),
            'region' => env('SCOUT_ELASTIC_CLIENT_AWS_REGION'),
            'hosts' => env('SCOUT_ELASTIC_CLIENT_AWS_HOSTS')
        ]
    ],
];