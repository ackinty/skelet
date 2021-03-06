<?php
return [
    'settings' => [
        // View settings
        'view' => [
            'template_path' => __DIR__ . '/templates',
            'twig' => [
                'cache' => __DIR__ . '/../cache/twig',
                'debug' => true,
                'auto_reload' => true,
            ],
        ],

        'displayErrorDetails' => true,

        // monolog settings
        'logger' => [
            'name' => 'app',
            'path' => __DIR__ . '/../log/app.log',
        ],

        // Eloquent settings
        'eloquent' => [
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'skelet',
            'username'  => 'sjelet',
            'password'  => 'sjelet',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ],

        // App specific
        'app' => [
            'appname' => 'skelet',
        ],

    ],
];
