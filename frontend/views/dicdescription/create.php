<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Dicdescription */

$this->title = 'Create Dicdescription';
$this->params['breadcrumbs'][] = ['label' => 'Dicdescriptions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dicdescription-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
