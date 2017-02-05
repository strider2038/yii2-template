<?php

return [
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log' => 'log',
    ],
    'language' => 'ru-RU',
    'sourceLanguage' => 'ru-RU',
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'charset' => 'utf8',
            'enableSchemaCache' => true,
            'schemaCacheDuration' => 3600,
            'schemaCache' => 'cache',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'formatter' => [
            'dateFormat' => 'php:d.m.Y',
            'datetimeFormat' => 'php:d.m.Y H:i:s',
            'timeFormat' => 'php:H:i:s',
            'decimalSeparator' => ',',
            'thousandSeparator' => ' ',
            'currencyCode' => 'Р',
            'locale' => 'ru-RU',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@app/views/mail',
            'htmlLayout' => 'layouts/html',
            'textLayout' => 'layouts/text',
        ],
        'log' => [
            'class' => 'yii\log\Dispatcher',
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                
            ],
        ],
    ],
    'modules' => [
    ],
    'params' => [
       
    ],
];