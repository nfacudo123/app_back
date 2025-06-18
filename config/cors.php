<?php

return [
    'paths' => ['*'], // Asegura que permita todas las rutas

    'allowed_methods' => ['*'],

    'allowed_origins' => [
        'https://examplereact.lat', // <--- TU FRONTEND EXACTO
    ],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,
];
