<?php

namespace app\html\assets;

use yii\web\View;

/**
 * Description of LayoutAsset
 *
 * @author Igor Lazarev <strider2038@rambler.ru>
 */
final class HtmlAsset extends \yii\web\AssetBundle {
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap/bootstrap.css',
    ];
    public $js = [
    ];
    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];
}
