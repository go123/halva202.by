<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Dicdescription */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dicdescription-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'titleOfView')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'titleRU')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ru')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>

    <?= $form->field($model, 'titleEN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'en')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
