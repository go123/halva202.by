<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DictionarySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dictionary-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'field') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'titleEN') ?>

    <?= $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'descriptionEN') ?>

    <?php // echo $form->field($model, 'link') ?>

    <?php // echo $form->field($model, 'linkEN') ?>

    <?php // echo $form->field($model, 'addInfo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
