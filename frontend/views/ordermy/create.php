<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Ordermy */

$this->title = 'Create Ordermy';
$this->params['breadcrumbs'][] = ['label' => 'Ordermies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ordermy-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
