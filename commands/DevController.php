<?php

namespace app\commands;

use Yii;

/**
 * Developer commands
 * @author Igor Lazarev <strider2038@rambler.ru>
 */
class DevController extends \strider2038\tools\components\CommandController
{
    /**
     * Showing available commands
     */
    public function actionIndex()
    {
        echo 'yii dev/datetime' . PHP_EOL;
        echo 'yii dev/error' . PHP_EOL;
    }
    
    /**
     * Echoing server datetime
     */
    public function actionDatetime() {
        echo "PHP datetime: " . date('Y-m-d H:i:s') . PHP_EOL;
        echo "Intl datetime: " . Yii::$app->formatter->asDatetime(time()) . PHP_EOL;
        echo "DB datetime: " . Yii::$app->db->createCommand('SELECT now()')->queryScalar() . PHP_EOL;
    }
    
    /**
     * Error log test
     */
    public function actionError() {
        $err = 5/0;
    }
    
}