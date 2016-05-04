<?php

/* @var $this yii\web\View */

$this->title = 'Halva202';
// use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

use yii\helpers\ArrayHelper;

use yii\helpers\Url;

use yii\bootstrap\Collapse;
?>

<div class="site-index">

    <div>
	<?php
	$contentHi=$this->render('index/hi',['dictionary'=>$dictionary]);
	$contentArticles=$this->render('index/articles',['dictionary'=>$dictionary]);
	$contentTutor=$this->render('index/tutor',['dictionary'=>$dictionary]);
	$contentProgrammer=$this->render('index/programmer',['dictionary'=>$dictionary]);
	$contentWebsite=$this->render('index/website',['dictionary'=>$dictionary]);
	$contentBiography=$this->render('index/biography',['dictionary'=>$dictionary]);
	$contentCo=$this->render('index/cooperation',['dictionary'=>$dictionary]);
	
	
	echo Collapse::widget([
		'items' => [
			[
				'label' => $dictionary['hi'],
				'content' => $contentHi,
				// Открыто по-умолчанию
				'contentOptions' => [
					// 'class' => 'in' // автораскрытие
				]
			],
			[
				'label' => 'Преподаю',
				'content' => $contentTutor,
				'contentOptions' => [],
				'options' => []
			],
			[
				'label' => 'Программирую',
				'content' => $contentProgrammer,
				'contentOptions' => [],
				'options' => []
			],
			[
				'label' => 'Делаем сайты, предоставляем услуги хостинга',
				'content' => $contentWebsite,
				'contentOptions' => [],
				'options' => []
			],
			[
				'label' => 'Пишу статьи',
				'content' => $contentArticles,
				'contentOptions' => [],
				'options' => []
			],
			[
				'label' => $dictionary['biography'],
				'content' => $contentBiography,
				'contentOptions' => [],
				'options' => []
			],
			[
				'label' => $dictionary['cooperation'],
				'content' => $contentCo,
				'contentOptions' => [],
				'options' => []
			],
		]
	]);
	?>
	</div>
	
</div>

