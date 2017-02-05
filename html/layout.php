<?php
\app\html\assets\HtmlAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <?= $this->render('@app/views/layouts/parts/head') ?>
</head>
<?php $this->beginBody() ?>
    <?= $content ?>
<?php $this->endBody() ?>
</html>
<?php $this->endPage() ?>