<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Line2Search */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="line2-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'titleRu') ?>

    <?= $form->field($model, 'titleEn') ?>

    <?= $form->field($model, 'commentRu') ?>

    <?php // echo $form->field($model, 'commentEn') ?>

    <?php // echo $form->field($model, 'idFloatOrder') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
