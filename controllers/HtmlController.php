<?php

namespace app\controllers;

use Yii;
use app\components\WebController;
use yii\web\NotFoundHttpException;

/**
 * Live html layout controller
 * @author Igor Lazarev <strider2038@rambler.ru>
 */
class HtmlController extends WebController {
    
    public function actionIndex() {
        if (!YII_ENV_DEV) {
            throw new NotFoundHttpException;
        }
        $this->layout = '@html/layout';
        $layout = strip_tags(Yii::$app->request->get('layout', 'main'));
        $page = strip_tags(Yii::$app->request->get('page', null));
        if (empty($page)) {
            return $this->render('@html/index');
        }
        return $this->render('@html/layouts/' . $layout, [
            'content' => $this->renderPartial('@html/pages/' . $page)
        ]);
    }
    
}
