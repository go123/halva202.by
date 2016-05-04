<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$idUser=$_SESSION['idRequireUser'];

/* @var $this yii\web\View */
/* @var $model app\models\Result */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="result-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'content_id')->textInput() ?>

    <?= $form->field($model, 'comment_TutorAboutPupil'.$idUser)->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'mark_TutorAboutPupil'.$idUser)->textInput() ?>

    <?= $form->field($model, 'date_TutorAboutPupil'.$idUser)->textInput() ?>

    <?= $form->field($model, 'comment_Pupil'.$idUser.'AboutTutor')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'mark_Pupil'.$idUser.'AboutTutor')->textInput() ?>

    <?= $form->field($model, 'date_Pupil'.$idUser.'AboutTutor')->textInput() ?>

    <?= $form->field($model, 'commentMaximum_TutorAboutPupil'.$idUser)->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'markMaximum_TutorAboutPupil'.$idUser)->textInput() ?>

    <?= $form->field($model, 'dateMaximum_TutorAboutPupil'.$idUser)->textInput() ?>

    <?= $form->field($model, 'commentMaximum_Pupil'.$idUser.'AboutTutor')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'markMaximum_Pupil'.$idUser.'AboutTutor')->textInput() ?>

    <?= $form->field($model, 'dateMaximum_Pupil'.$idUser.'AboutTutor')->textInput() ?>

    <?= $form->field($model, 'comment_Pupil'.$idUser.'AboutPupil'.$idUser)->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'mark_Pupil'.$idUser.'AboutPupil'.$idUser)->textInput() ?>

    <?= $form->field($model, 'date_Pupil'.$idUser.'AboutPupil'.$idUser)->textInput() ?>

    <?= $form->field($model, 'commentMaximum_Pupil'.$idUser.'AboutPupil'.$idUser)->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'markMaximum_Pupil'.$idUser.'AboutPupil'.$idUser)->textInput() ?>

    <?= $form->field($model, 'dateMaximum_Pupil'.$idUser.'AboutPupil'.$idUser)->textInput() ?>

    <?= $form->field($model, 'moderationPupil'.$idUser)->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
