<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ordermy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ordermy-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'web')->textInput() ?>

    <?= $form->field($model, 'phys')->textInput() ?>

    <?= $form->field($model, 'math')->textInput() ?>

    <?= $form->field($model, 'chem')->textInput() ?>

    <?= $form->field($model, 'go')->textInput() ?>

    <?= $form->field($model, 'many')->textInput() ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
