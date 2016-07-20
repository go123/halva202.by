<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrdermySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ordermy-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'web') ?>

    <?= $form->field($model, 'phys') ?>

    <?= $form->field($model, 'math') ?>

    <?php // echo $form->field($model, 'chem') ?>

    <?php // echo $form->field($model, 'go') ?>

    <?php // echo $form->field($model, 'many') ?>

    <?php // echo $form->field($model, 'comment') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
