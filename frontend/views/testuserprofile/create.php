<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Testuserprofile */

$this->title = 'Create Testuserprofile';
$this->params['breadcrumbs'][] = ['label' => 'Testuserprofiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="testuserprofile-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
