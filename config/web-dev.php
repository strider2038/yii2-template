<?php

return [
    'bootstrap' => [
        'debug' => 'debug', 
        'gii' => 'gii'
    ],
    'modules' => [
        'debug' => [
            'class' => 'yii\debug\Module',
            'allowedIPs' => ['127.0.0.1', '::1', '192.168.*.*'],
        ],
        'gii' => [
            'class' => 'yii\gii\Module',
            'allowedIPs' => ['127.0.0.1', '::1', '192.168.*.*']
        ],
    ],
    'aliases' => [
        '@html' => __DIR__ . '/../html',
    ],
];