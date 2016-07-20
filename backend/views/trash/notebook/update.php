<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Notebook */

$this->title = 'Update Notebook: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Notebooks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="notebook-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
