<?php

/**
 * Параметры для консольного приложения. 
 * 
 * Структура конфигов
 *   web.php - параметры web-элементов Yii (корневой)
 *   console.php - параметры console-элементов Yii (корневой)
 *   common.php - общие параметры элементов Yii
 *   console-dev.php - параметры среды разработки
 *   console-prod.php - параметры производственной среды
 *   local.php - локальные параметры
 * 
 * Конфиги dev*.php и prod*.php выбираются в зависимости от переменной
 * окружения APP_ENV (задается в настройках Apache)
 * 
 * ВНИМАНИЕ!!! Неименованные настройки заменяются перекрывающимися массивами!
 * Например 'bootstrap' => ['log'] будет заменена 'bootstrap' => ['debug', 'gii'].
 * Поэтому следует их всега именовать 'bootstrap' => ['log' => 'log']! 
 */

Yii::setAlias('@tests', dirname(__DIR__) . '/tests/codeception');

$console = [
    'id' => 'app-console',
    'controllerNamespace' => 'app\commands',
    'controllerMap' => [
        
    ],
    'components' => [
        'errorHandler' => [
            'class' => 'strider2038\tools\components\CommandErrorHandler',
        ],
        'log' => [
            'targets' => [
                // common log for all console commands
                'cmd' => [
                    'class' => 'strider2038\tools\components\CommandFileTarget',
                ],
            ],
        ],
    ],
];

// Чтение и слияние вторичных массивов параметров
$localFilename = __DIR__ . '/local.php';
$common = require(__DIR__ . '/common.php');
$env = require(__DIR__ . (YII_ENV_DEV ? '/console-dev.php' : '/console-prod.php'));
$local = file_exists($localFilename) ? require($localFilename) : [];

return array_replace_recursive($common, $console, $env, $local);