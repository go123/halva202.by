<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Line2 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="line2-form">
	
    <?php $form = ActiveForm::begin(); ?>
	<div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'titleRu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'titleEn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'commentRu')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'commentEn')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'idFloatOrder')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
