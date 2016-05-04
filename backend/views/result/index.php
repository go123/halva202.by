<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ResultSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Results';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="result-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
	$idUser=$_SESSION['idRequireUser'];
	
	?>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'content_id',
			'comment_TutorAboutPupil'.$idUser.':ntext',
            'mark_TutorAboutPupil'.$idUser,
            'date_TutorAboutPupil'.$idUser,
            // 'comment_Pupil'.$idUser.'AboutTutor:ntext',
            // 'mark_Pupil'.$idUser.'AboutTutor',
            // 'date_Pupil'.$idUser.'AboutTutor',
            // 'commentMaximum_TutorAboutPupil'.$idUser.':ntext',
            // 'markMaximum_TutorAboutPupil'.$idUser,
            // 'dateMaximum_TutorAboutPupil'.$idUser,
            // 'commentMaximum_Pupil'.$idUser.'AboutTutor:ntext',
            // 'markMaximum_Pupil'.$idUser.'AboutTutor',
            // 'dateMaximum_Pupil'.$idUser.'AboutTutor',
            // 'comment_Pupil'.$idUser.'AboutPupil'.$idUser.':ntext',
            // 'mark_Pupil'.$idUser.'AboutPupil'.$idUser,
            // 'date_Pupil'.$idUser.'AboutPupil'.$idUser,
            // 'commentMaximum_Pupil'.$idUser.'AboutPupil'.$idUser.':ntext',
            // 'markMaximum_Pupil'.$idUser.'AboutPupil'.$idUser,
            // 'dateMaximum_Pupil'.$idUser.'AboutPupil'.$idUser,
            // 'moderationPupil'.$idUser,
			            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
