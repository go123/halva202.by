<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UseprofilenewSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Userprofilenews';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userprofilenew-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Userprofilenew', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            // 'name',
			/* ['attribute' => 'name','label'=>'имя','content'=>function($data){
                // return "value2";
				$data='id - ';
				return $data; 
            }],*/
			[
				'attribute' => 'name',
				'format' => 'raw',
				'value' => function($model){
					/* if($model->viewOfWater==0){$viewOfWaterText='холодная';}
					else{$viewOfWaterText='горячая';} */
					return Html::a('link',['updatecounter', 'idTest' => 'test', 'idTest2' => $model->name]);
				},
			],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
