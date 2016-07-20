<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Line2 */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Line'.$_SESSION['nowN'].'s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="line2-view">

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
            // 'lineParentN_id',
			'lineprevn.title',
            'titleRu',
            'titleEn',
            'commentRu:ntext',
            'commentEn:ntext',
            'idFloatOrder',
			'timeOfStart:datetime',
			'user.username',
            // 'center_id',
        ],
    ]) ?>

</div>
