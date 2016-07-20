<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Notebook */

$this->title = 'Create Notebook';
$this->params['breadcrumbs'][] = ['label' => 'Notebooks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notebook-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
