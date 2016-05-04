<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Result */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Results', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$idUser=$_SESSION['idRequireUser'];
?>
<div class="result-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'content_id',
            'comment_TutorAboutPupil'.$idUser.':ntext',
            'mark_TutorAboutPupil'.$idUser,
            'date_TutorAboutPupil'.$idUser,
            'comment_Pupil'.$idUser.'AboutTutor:ntext',
            'mark_Pupil'.$idUser.'AboutTutor',
            'date_Pupil'.$idUser.'AboutTutor',
            'commentMaximum_TutorAboutPupil'.$idUser.':ntext',
            'markMaximum_TutorAboutPupil'.$idUser,
            'dateMaximum_TutorAboutPupil'.$idUser,
            'commentMaximum_Pupil'.$idUser.'AboutTutor:ntext',
            'markMaximum_Pupil'.$idUser.'AboutTutor',
            'dateMaximum_Pupil'.$idUser.'AboutTutor',
            'comment_Pupil'.$idUser.'AboutPupil'.$idUser.':ntext',
            'mark_Pupil'.$idUser.'AboutPupil'.$idUser,
            'date_Pupil'.$idUser.'AboutPupil'.$idUser,
            'commentMaximum_Pupil'.$idUser.'AboutPupil'.$idUser.':ntext',
            'markMaximum_Pupil'.$idUser.'AboutPupil'.$idUser,
            'dateMaximum_Pupil'.$idUser.'AboutPupil'.$idUser,
            'moderationPupil'.$idUser,
        ],
    ]) ?>

</div>
