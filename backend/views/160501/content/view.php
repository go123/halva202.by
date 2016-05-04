<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Content */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Contents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-view">

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
            'title',
            'moderation',
            'listsql_id',
            'parent_id',
            'grade_id',
            'comment_TutorAboutPupil1:ntext',
            'mark_TutorAboutPupil1',
            'date_TutorAboutPupil1',
            'comment_Pupil1AboutTutor:ntext',
            'mark_Pupil1AboutTutor',
            'date_Pupil1AboutTutor',
            'commentMaximum_TutorAboutPupil1:ntext',
            'markMaximum_TutorAboutPupil1',
            'dateMaximum_TutorAboutPupil1',
            'commentMaximum_Pupil1AboutTutor:ntext',
            'markMaximum_Pupil1AboutTutor',
            'dateMaximum_Pupil1AboutTutor',
            'comment_Pupil1AboutPupil1:ntext',
            'mark_Pupil1AboutPupil1',
            'date_Pupil1AboutPupil1',
            'commentMaximum_Pupil1AboutPupil1:ntext',
            'markMaximum_Pupil1AboutPupil1',
            'dateMaximum_Pupil1AboutPupil1',
        ],
    ]) ?>

</div>
