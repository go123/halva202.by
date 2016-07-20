<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Line2 */

$this->title = 'Update Items of '.$_SESSION['nowN'].' level: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Items of '.$_SESSION['nowN'].' level', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="line2-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
