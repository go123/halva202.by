<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DicdescriptionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dicdescriptions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dicdescription-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Dicdescription', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'titleOfView',
            'titleRU',
            // 'ru:ntext',
            'titleEN',
            // 'en:ntext',
            // 'comment:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
