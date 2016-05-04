<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ResultSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="result-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'moderation') ?>

    <?= $form->field($model, 'listsql_id') ?>

    <?= $form->field($model, 'parent_id') ?>

    <?php // echo $form->field($model, 'grade_id') ?>

    <?php // echo $form->field($model, 'comment_TutorAboutPupil1') ?>

    <?php // echo $form->field($model, 'mark_TutorAboutPupil1') ?>

    <?php // echo $form->field($model, 'date_TutorAboutPupil1') ?>

    <?php // echo $form->field($model, 'comment_Pupil1AboutTutor') ?>

    <?php // echo $form->field($model, 'mark_Pupil1AboutTutor') ?>

    <?php // echo $form->field($model, 'date_Pupil1AboutTutor') ?>

    <?php // echo $form->field($model, 'commentMaximum_TutorAboutPupil1') ?>

    <?php // echo $form->field($model, 'markMaximum_TutorAboutPupil1') ?>

    <?php // echo $form->field($model, 'dateMaximum_TutorAboutPupil1') ?>

    <?php // echo $form->field($model, 'commentMaximum_Pupil1AboutTutor') ?>

    <?php // echo $form->field($model, 'markMaximum_Pupil1AboutTutor') ?>

    <?php // echo $form->field($model, 'dateMaximum_Pupil1AboutTutor') ?>

    <?php // echo $form->field($model, 'comment_Pupil1AboutPupil1') ?>

    <?php // echo $form->field($model, 'mark_Pupil1AboutPipil1') ?>

    <?php // echo $form->field($model, 'date_Pupil1AboutPipil1') ?>

    <?php // echo $form->field($model, 'commentMaximum_Pupil1AboutPupil1') ?>

    <?php // echo $form->field($model, 'markMaximum_Pupil1AboutPipil1') ?>

    <?php // echo $form->field($model, 'dateMaximum_Pupil1AboutPipil1') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
