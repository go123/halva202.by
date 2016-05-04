<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Result */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="result-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'moderation')->textInput() ?>

    <?= $form->field($model, 'listsql_id')->textInput() ?>

    <?= $form->field($model, 'parent_id')->textInput() ?>

    <?= $form->field($model, 'grade_id')->textInput() ?>

    <?= $form->field($model, 'comment_TutorAboutPupil1')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'mark_TutorAboutPupil1')->textInput() ?>

    <?= $form->field($model, 'date_TutorAboutPupil1')->textInput() ?>

    <?= $form->field($model, 'comment_Pupil1AboutTutor')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'mark_Pupil1AboutTutor')->textInput() ?>

    <?= $form->field($model, 'date_Pupil1AboutTutor')->textInput() ?>

    <?= $form->field($model, 'commentMaximum_TutorAboutPupil1')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'markMaximum_TutorAboutPupil1')->textInput() ?>

    <?= $form->field($model, 'dateMaximum_TutorAboutPupil1')->textInput() ?>

    <?= $form->field($model, 'commentMaximum_Pupil1AboutTutor')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'markMaximum_Pupil1AboutTutor')->textInput() ?>

    <?= $form->field($model, 'dateMaximum_Pupil1AboutTutor')->textInput() ?>

    <?= $form->field($model, 'comment_Pupil1AboutPupil1')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'mark_Pupil1AboutPipil1')->textInput() ?>

    <?= $form->field($model, 'date_Pupil1AboutPipil1')->textInput() ?>

    <?= $form->field($model, 'commentMaximum_Pupil1AboutPupil1')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'markMaximum_Pupil1AboutPipil1')->textInput() ?>

    <?= $form->field($model, 'dateMaximum_Pupil1AboutPipil1')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
