<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Progress;

use app\models\Result;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Line2Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Items of '.$_SESSION['nowN'].' level';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="line2-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create item of '.$_SESSION['nowN'].' level', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'title',
			[
				'attribute' => 'title',
				'format' => 'raw',
				'value' => function($model){
					$futureN = $_SESSION['nowN'] + 1;
					return Html::a($model->title,['/linen/index', 'lineParentN_id' => $model->id, 'futureN' => $futureN]);
				},
			],
			['class' => 'yii\grid\ActionColumn',
				'template' => '{view} {link}',
			],
			[
				'attribute' => 'result',
				'format' => 'raw',
				'label'=>'result',
				'value' => function($model){
					$result = new Result;
					$mark = $result->knowMark($center_id = $model->center_id, $customer_id = \Yii::$app->user->id);
					
					// $label = 'result ('.$mark.' from 100)';
					$label = 'result ('.$mark.' from 100)'.Progress::widget([
						'percent' => $mark,
						'barOptions' => [
							'class' => 'progress-bar-success'
						],
						'options' => [
							'class' => 'active progress-striped'
						]
					]);
					return Html::a($label,['/result/index', 'id' => $model->id, 'center_id' => $model->center_id ]);
				},
			],
            'titleRu',
            'titleEn',
            // 'commentRu:ntext',
            // 'commentEn:ntext',
            // 'idFloatOrder',

            // ['class' => 'yii\grid\ActionColumn'],
			['class' => 'yii\grid\ActionColumn',
				'template' => '{update} {link}',
			],
        ],
    ]); ?>
</div>
