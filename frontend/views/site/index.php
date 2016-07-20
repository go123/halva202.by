<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\bootstrap\Collapse;
use app\models\Result;
use app\models\Center;
use yii\bootstrap\Progress;
use app\models\Dicdescription;
use app\models\Notebook;
use app\models\dictionary;

/* @var $this yii\web\View */

$this->title = 'Halva202';
?>
<?php
// $notebook = new Notebook;
// $aboutMeRecord = $notebook->find()->where(['title'=>'aboutMe'])->one();
// $aboutMe = $aboutMeRecord['description'];
?>

<div class="site-index">

    <div>
	<?php
	$contentHi=$this->render('index/hi',['dictionary'=>$dictionary,'aboutMe'=>$aboutMe,]);
	$contentArticles=$this->render('index/articles',['dictionary'=>$dictionary]);
	$contentTutor=$this->render('index/tutor',['dictionary'=>$dictionary]);
	$contentProgrammer=$this->render('index/programmer',['dictionary'=>$dictionary]);
	$contentWebsite=$this->render('index/website',['dictionary'=>$dictionary]);
	$contentBiography=$this->render('biography',['dictionary'=>$dictionary]);
	$contentCo=$this->render('index/cooperation',['dictionary'=>$dictionary]);
	
	if(\Yii::$app->user->id){// для авторизованных
		$openedCollapse = 'no_in';
		echo'<h1>Last <a href="/result/index">results</a></h1>';// last results
	}
	else{// для неавторизованных
		$openedCollapse = 'in';
	}?>
		
	<ul>
	<?php foreach ($marks as $mark): ?>
		<li>
			<?php $record = Center::findOne($mark->center_id);$title = $record->title;?>
			<?= $title.' ('.$mark->mark.' from 100)'.Progress::widget([
							'percent' => $mark->mark,
							'barOptions' => [
								'class' => 'progress-bar-success'
							],
							'options' => [
								'class' => 'active progress-striped'
							]
						]) ?>
		</li>
	<?php endforeach; ?>
	</ul>
	
	<?= Collapse::widget([
		'items' => [
			[
				'label' => $dictionary['hi'],
				'content' => $contentHi,
				// Открыто по-умолчанию
				'contentOptions' => [
					'class' => $openedCollapse // автораскрытие
				]
			],
			[
				// 'label' => 'Преподаю',
				'label' => dictionary::takeTitleFromBD('site/index/tutor'),
				'content' => $contentTutor,
				'contentOptions' => [],
				'options' => []
			],
			[
				'label' => dictionary::takeTitleFromBD('site/index/programmer'),
				'content' => $contentProgrammer,
				'contentOptions' => [],
				'options' => []
			],
			[
				'label' => dictionary::takeTitleFromBD('site/index/website'),
				'content' => $contentWebsite,
				'contentOptions' => [],
				'options' => []
			],
			[
				'label' => dictionary::takeTitleFromBD('site/index/articles'),
				'content' => $contentArticles,
				'contentOptions' => [],
				'options' => []
			],
			[
				'label' => dictionary::takeTitleFromBD('site/index/biography'),
				'content' => $contentBiography,
				'contentOptions' => [],
				'options' => []
			],
			[
				'label' => dictionary::takeTitleFromBD('site/index/cooperation'),
				'content' => $contentCo,
				'contentOptions' => [],
				'options' => []
			],
		]
	]);
	?>
	</div>
	
</div>

