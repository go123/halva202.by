<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Line2 */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Items of '.$_SESSION['nowN'].' level', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="line2-view">

    <h1><?= Html::encode($this->title) ?></h1>
	
	
	
	<?php 
	// create dir
	$filename = 'images/center/center'.$model->center_id;

	if (file_exists($filename)) {
		echo'<a href="/frontend/web/images/center/center'.$model->center_id.'">files</a>';
	} 
	else {
		// mkdir($filename, 0700, true);
		
	}
	// /create dir
	?>
	<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

		<?= $form->field($modelUploadForm, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*'])->label(false) ?>

		<button>Add new files</button>

	<?php ActiveForm::end() ?>
	


	<br><br>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
	
	<?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            // 'lineParentN_id',
			'lineprevn.title',
            'titleRu',
            'titleEn',
            'commentRu:ntext',
            'commentEn:ntext',
            'idFloatOrder',
			'timeOfStart:datetime',
			'user.username',
            // 'center_id',
        ],
    ]) ?>

</div>

