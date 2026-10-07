<?php

return [
    'paths' => [
        resource_path('views'),
    ],

    // Tanpa realpath(): realpath() mengembalikan false kalau folder belum ada,
    // dan itu yang memicu error "Please provide a valid cache path".
    'compiled' => env('VIEW_COMPILED_PATH', storage_path('framework/views')),
];
