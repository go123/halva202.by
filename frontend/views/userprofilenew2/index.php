<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Useprofilenew2Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Userprofilenew2s';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userprofilenew2-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Userprofilenew2', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            // 'name',
			[
				'attribute' => 'name',
				'format' => 'raw',
				'value' => function($model){
					/* if($model->viewOfWater==0){$viewOfWaterText='холодная';}
					else{$viewOfWaterText='горячая';} */
					return Html::a($model->name,['upgradepupil', 'idPupil' => $model->user_id, 'idTest2' => $model->name]);
				},
			],
            'user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
