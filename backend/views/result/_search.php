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

    <?= $form->field($model, 'content_id') ?>

    <?= $form->field($model, 'comment_TutorAboutPupil'.$idUser) ?>

    <?= $form->field($model, 'mark_TutorAboutPupil'.$idUser) ?>

    <?= $form->field($model, 'date_TutorAboutPupil'.$idUser) ?>

    <?php // echo $form->field($model, 'comment_Pupil'.$idUser.'AboutTutor') ?>

    <?php // echo $form->field($model, 'mark_Pupil'.$idUser.'AboutTutor') ?>

    <?php // echo $form->field($model, 'date_Pupil'.$idUser.'AboutTutor') ?>

    <?php // echo $form->field($model, 'commentMaximum_TutorAboutPupil'.$idUser) ?>

    <?php // echo $form->field($model, 'markMaximum_TutorAboutPupil'.$idUser) ?>

    <?php // echo $form->field($model, 'dateMaximum_TutorAboutPupil'.$idUser) ?>

    <?php // echo $form->field($model, 'commentMaximum_Pupil'.$idUser.'AboutTutor') ?>

    <?php // echo $form->field($model, 'markMaximum_Pupil'.$idUser.'AboutTutor') ?>

    <?php // echo $form->field($model, 'dateMaximum_Pupil'.$idUser.'AboutTutor') ?>

    <?php // echo $form->field($model, 'comment_Pupil'.$idUser.'AboutPupil'.$idUser) ?>

    <?php // echo $form->field($model, 'mark_Pupil'.$idUser.'AboutPupil'.$idUser) ?>

    <?php // echo $form->field($model, 'date_Pupil'.$idUser.'AboutPupil'.$idUser) ?>

    <?php // echo $form->field($model, 'commentMaximum_Pupil'.$idUser.'AboutPupil'.$idUser) ?>

    <?php // echo $form->field($model, 'markMaximum_Pupil'.$idUser.'AboutPupil'.$idUser) ?>

    <?php // echo $form->field($model, 'dateMaximum_Pupil'.$idUser.'AboutPupil'.$idUser) ?>

    <?php // echo $form->field($model, 'moderationPupil'.$idUser) ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
