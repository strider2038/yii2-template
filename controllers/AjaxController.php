<?php

namespace app\controllers;

use Yii;
use yii\web\Response;

/**
 * AjaxController
 *
 * @author Igor Lazarev <strider2038@rambler.ru>
 */
class AjaxController extends \app\components\WebController {
    
    /**
     * Example for Ajax Debugger component
     * Just call /ajax/example1?debug=1
     * @see https://github.com/strider2038/yii2-ajax-debugger
     * @return array
     */
    public function actionExample1() {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return [
            'ok' => true,
            'data' => [
                'obj' => ['a' => 1, 'b' => 2],
                'arr' => [1, 2, 3],
                'null' => null
            ]
        ];
    }
    
    /**
     * Example for Ajax Debugger component
     * Just call /ajax/example1?debug=1
     * @see https://github.com/strider2038/yii2-ajax-debugger
     * @return array
     */
    public function actionExample2() {
        Yii::$app->response->format = Response::FORMAT_JSONP;
        return [
            'callback' => 'callback',
            'data' => [
                'obj' => ['a' => 1, 'b' => 2],
                'arr' => [1, 2, 3],
                'null' => null,
                's' => '<b>this</b> is <i>awesome</i> <script>alert("danger!");</script>',
                's2' => 'Кириллица & и \n перенос'
            ]
        ];
    }
    
}
