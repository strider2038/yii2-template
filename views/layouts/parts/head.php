<?php
use yii\helpers\Html;

?>
<meta charset="<?= Yii::$app->charset ?>"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?= Html::csrfMetaTags() ?>
<title><?= !empty($this->title) ? Html::encode($this->title) . ' | ' : '' ?>Yii2 template</title>
<link rel="shortcut icon" href="/favicon.ico"/>
<?php $this->head() ?>