<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Userprofilenew2 */

$this->title = 'Create Userprofilenew2';
$this->params['breadcrumbs'][] = ['label' => 'Userprofilenew2s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userprofilenew2-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
