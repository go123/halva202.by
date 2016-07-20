<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Line2 */

$this->title = 'Create Line'.$_SESSION['nowN'];
$this->params['breadcrumbs'][] = ['label' => 'Line'.$_SESSION['nowN'].'s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="line2-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
