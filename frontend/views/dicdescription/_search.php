<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DicdescriptionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dicdescription-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'titleOfView') ?>

    <?= $form->field($model, 'titleRU') ?>

    <?= $form->field($model, 'ru') ?>

    <?= $form->field($model, 'titleEN') ?>

    <?php // echo $form->field($model, 'en') ?>

    <?php // echo $form->field($model, 'comment') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
