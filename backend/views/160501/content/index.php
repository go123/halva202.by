<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ContentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Content', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'moderation',
            'listsql_id',
            'parent_id',
            // 'grade_id',
            // 'comment_TutorAboutPupil1:ntext',
            // 'mark_TutorAboutPupil1',
            // 'date_TutorAboutPupil1',
            // 'comment_Pupil1AboutTutor:ntext',
            // 'mark_Pupil1AboutTutor',
            // 'date_Pupil1AboutTutor',
            // 'commentMaximum_TutorAboutPupil1:ntext',
            // 'markMaximum_TutorAboutPupil1',
            // 'dateMaximum_TutorAboutPupil1',
            // 'commentMaximum_Pupil1AboutTutor:ntext',
            // 'markMaximum_Pupil1AboutTutor',
            // 'dateMaximum_Pupil1AboutTutor',
            // 'comment_Pupil1AboutPupil1:ntext',
            // 'mark_Pupil1AboutPupil1',
            // 'date_Pupil1AboutPupil1',
            // 'commentMaximum_Pupil1AboutPupil1:ntext',
            // 'markMaximum_Pupil1AboutPupil1',
            // 'dateMaximum_Pupil1AboutPupil1',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
