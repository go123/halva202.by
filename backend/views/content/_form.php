<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Content */
/* @var $form yii\widgets\ActiveForm */

use yii\helpers\ArrayHelper;
use app\models\Content;
$content = Content::find()->all();
$items = ArrayHelper::map($content,'id','title');
    /* $params = [
        'prompt' => 'Выберите пользователя'
    ]; */
use app\models\Listsql;
$listsql = Listsql::find()->all();
$items2 = ArrayHelper::map($listsql,'id','title');
use app\models\Grade;
$Grade = Grade::find()->all();
$items3 = ArrayHelper::map($Grade,'id','title');
?>

<div class="content-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'moderation')->dropDownList([
			'0' => 'no public',
			'1' => 'public',
			'2' => 'wait',
		]) ?>

    <?= $form->field($model, 'listsql_id')->dropDownList($items2) ?>

    <?= $form->field($model, 'parent_id')->dropDownList($items/* ,$params */) ?>

    <?= $form->field($model, 'grade_id')->dropDownList($items3) ?>

    <?= $form->field($model, 'additionalInformation')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
