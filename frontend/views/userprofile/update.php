<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Testuserprofile */

$this->title = 'Update Testuserprofile: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Testuserprofiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="testuserprofile-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
