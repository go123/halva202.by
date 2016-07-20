<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Quiz */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quiz-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'question')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'answer1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'answer2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'answer3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'answer4')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'queue')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
