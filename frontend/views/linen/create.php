<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Line2 */

$this->title = 'Create Item of '.$_SESSION['nowN'].' level';
$this->params['breadcrumbs'][] = ['label' => 'Items of '.$_SESSION['nowN'].' level', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="line2-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
