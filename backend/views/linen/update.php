<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Line2 */

$this->title = 'Update Line'.$_SESSION['nowN'].': ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Line'.$_SESSION['nowN'].'s', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="line2-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
