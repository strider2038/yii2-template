<?php

/**
 * Параметры для Web-приложения. 
 * 
 * Структура конфигов
 *   web.php - параметры web-элементов Yii (корневой)
 *   common.php - общие параметры элементов Yii
 *   local.php - локальные параметры
 * 
 * ВНИМАНИЕ!!! Неименованные настройки заменяются перекрывающимися массивами!
 * Например 'bootstrap' => ['log'] будет заменена 'bootstrap' => ['debug', 'gii'].
 * Поэтому следует их всега именовать 'bootstrap' => ['log' => 'log']! 
 */

$web = [
    'id' => 'app-web',
    'defaultRoute' => 'site/index',
    'bootstrap' => [
        'ajaxDebugger' => 'ajaxDebugger'
    ],
    'components' => [
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['site/login']
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'request' => [
            'enableCookieValidation' => true,
            'cookieValidationKey' => '',
        ],
        'log' => [
            'targets' => [
                'error' => [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error'],
                    'logFile' => '@app/runtime/logs/web-error.log'
                ],
                'warning' => [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['warning'],
                    'logFile' => '@app/runtime/logs/web-warning.log'
                ],
                'critical' => [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning', 'info'],
                    'categories' => ['critical'],
                    'logFile' => '@app/runtime/logs/web-critical.log',
                ],
            ],
        ],
        'assetManager' => [
            'appendTimestamp' => false,
            'bundles' => [
                'yii\bootstrap\BootstrapAsset' => [
                    'basePath' => '@webroot',
                    'baseUrl' => '@web',
                    'css' => [
                        'css/bootstrap/bootstrap.css',
                    ],
                ],
            ],
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'site/index',
                
                '<_c:[\w\-]+>/<id:\d+>' => '<_c>/view',
                '<_c:[\w\-]+>' => '<_c>/index',
                '<_c:[\w\-]+>/<_a:[\w\-]+>' => '<_c>/<_a>',

                '<_m:[\w\-]+>/<_c:[\w\-]+>/<_a:[\w\-]+>/<id:\d+>' => '<_m>/<_c>/<_a>',
                '<_m:[\w\-]+>/<_c:[\w\-]+>/<_a:[\w\-]+>' => '<_m>/<_c>/<_a>',
                '<_m:[\w\-]+>/<_c:[\w\-]+>/<id:\d+>' => '<_m>/<_c>/view',
                '<_m:[\w\-]+>' => '<_m>/default/index',
                '<_m:[\w\-]+>/<_c:[\w\-]+>' => '<_m>/<_c>/index',
            ],
        ],
        'ajaxDebugger' => [
            'class' => 'strider2038\ajaxdebugger\DebugDetector',
            'enabled' => YII_ENV_DEV && !empty($_GET['_debug']),
        ]
    ],
    'params' => [
        
    ],
];

// Чтение и слияние вторичных массивов параметров
$localFilename = __DIR__ . '/local.php';
$common = require(__DIR__ . '/common.php');
$env = require(__DIR__ . (YII_ENV_DEV ? '/web-dev.php' : '/web-prod.php'));
$local = file_exists($localFilename) ? require($localFilename) : [];

return array_replace_recursive($common, $web, $env, $local);