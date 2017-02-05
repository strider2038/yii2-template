<?php

use app\widgets\SampleWidget;

/** @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="jumbotron">
        <h1><?= $this->title ?></h1>
        <p class="lead">Template for creating web projects based of Yii2 framework</p>
    </div>
    <div class="body-content">
        <div class="row">
            <?= SampleWidget::widget() ?>
            <?= SampleWidget::widget() ?>
            <?= SampleWidget::widget() ?>
        </div>
    </div>
</div>
