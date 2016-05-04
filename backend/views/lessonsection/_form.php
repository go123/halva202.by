<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


use yii\helpers\ArrayHelper;
use app\models\Lesson;
$lessons = Lesson::find()->all();
$items = ArrayHelper::map($lessons,'id','title');
    $params = [
        'prompt' => 'Выберите урок'
    ];

/* @var $this yii\web\View */
/* @var $model app\models\LessonSection */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lesson-section-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lesson_id')->dropDownList($items,$params) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'class')->textInput() ?>

    <?= $form->field($model, 'serialNumber')->textInput() ?>

    <?= $form->field($model, 'additionalInformation')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
