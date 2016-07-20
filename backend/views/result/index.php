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
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
		<?php
		if($createButton == 'yes'){echo Html::a('Create Result', ['create'], ['class' => 'btn btn-success']);}
		?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

			['class' => 'yii\grid\ActionColumn',
				'template' => '{view} {link}',
			],
			
			
            // 'id',
			'center.title',
			'user.username',
            'mark',
            // 'comment:ntext',
			[
				'attribute' => 'edit',
				'format' => 'raw',
				'label'=>'edit',
				'value' => function($model){
					if($model->supplier_id == Yii::$app->user->id){
						return Html::a('edit',['/result/update', 'id' => $model->id ]);
					}
					
				},
			],

            
        ],
    ]); ?>
</div>
