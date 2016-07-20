<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

use yii\helpers\Url;

use app\models\dictionary;
$object_dictionary = new dictionary;
$dictionary=$object_dictionary->getDictionary();

use yii\bootstrap\Button;



AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<?php ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Halva202',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top ico',
        ],
    ]);
	
	
	if (!Yii::$app->user->isGuest){
		// $menuItems[] = ['label' => 'golevel2item', 'url' => ['/level2item']];
		$menuItems[] = ['label' => 'go', 'url' => ['/linen/index?lineParentN_id=1&futureN=2']];
		if(\Yii::$app->user->identity->id==1){
			// $menuItems[] = ['label' => 'Pupils', 'url' => ['/userprofilenew2/index']];
			$menuItems[] = ['label' => 'asAdmin', 'url' => ['/../../admin']];
		}
	}
	
	
    $menuItems = [
		// ['label' => 'lesson', 'url' => ['/level1id1']],
	
		// ['label' => $dictionary['home'], 'url' => ['/site/index']],
		
		
	
		
		['label' => 'Content', 'url' => ['/site/index']],
	
		['label' => 'service', /* 'url' => ['product/index'], */ 'items' => [
            ['label' => $dictionary['tutor'], 'url' => ['site/tutor', /* 'tag' => 'new' */]],
            ['label' => $dictionary['orderWebsite'], 'url' => 'http://cvr.by/'],
        ]],
		['label' => 'other', /* 'url' => ['product/index'], */ 'items' => [
            ['label' => 'Yandex-disk', 'items' => [
				['label' => 'tutor', 'url' => 'https://yadi.sk/d/ijt3okO9q3aqR'],
				['label' => 'notebook', 'url' => 'https://yadi.sk/d/NXMIqBYLoyb7b'],
			]],
            ['label' => 'Календарь', 'url' => 'https://calendar.yandex.ru/week?embed&private_token=bb07b200d6f883707f1f430e8dfad8b46dc5053d&tz_id=Europe/Minsk'],
            ['label' => 'Репозитории', 'url' => 'https://github.com/halva202'],
            ['label' => 'Реквизиты для оплаты', 'url' => ['site/money', ]],
        ]],
		// ['label' => $dictionary['tutor'], 'url' => ['/site/tutor']],
		// ['label' => $dictionary['cooperation'], 'url' => ['/site/cooperation']],
		// ['label' => $dictionary['orderWebsite'], 'url' => 'http://cvr.by/'],
		['label' => $dictionary['contacts'], 'url' => ['/site/contactmy']],
		// ['label' => $dictionary['articles'], 'url' => ['/site/articles']],
		// ['label' => $dictionary['biography'], 'url' => ['/site/biography']],
        // ['label' => 'About', 'url' => ['/site/about']],
        // ['label' => 'Contact', 'url' => ['/site/contact']],
		// ['label' => 'контактные данные', 'url' => ['/site/contactmy']],
		// ['label' => 'другое', 'url' => ['/site/other']],
		// ['label' => 'Репетитор', 'url' => 'http://repetitor.github.io/'],
		// ['label' => 'Сделать сайт', 'url' => 'http://cvr.by/'],
		// ['label' => 'Английские спикин-клабы в Минске', 'url' => 'http://cvr.by/blog/istorii-uspekha/item/118-english-speaking-clubs-v-minske.html'],
    ];
	// if user is halva202 (in future this menu will shown foe everybody)
	if (!Yii::$app->user->isGuest){
		// $menuItems[] = ['label' => 'golevel2item', 'url' => ['/level2item']];
		$menuItems[] = ['label' => 'go', 'url' => ['/linen/index?lineParentN_id=1&futureN=2']];
		if(\Yii::$app->user->identity->id==1){
			// $menuItems[] = ['label' => 'Pupils', 'url' => ['/userprofilenew2/index']];
			$menuItems[] = ['label' => 'asAdmin', 'url' => ['/../../admin']];
		}
	}
	/* if (!Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Репетитор', 'url' => ['/site/tutor']];
    } */
    if (Yii::$app->user->isGuest) {
        // $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => $dictionary['login'], 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                $dictionary['logout'].' (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
		
		<?php
		// $language = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
		/* $urlRu = Url::to(['set/language', 'language' => 'ru']);
		$urlEn = Url::to(['set/language', 'language' => 'en']);
		echo'<br>';echo'<br>';echo'<br>'; */
		?>
		Choose your preferred language for displaying pages:
		<?= Html::a('Русский', ['set/language', 'language' => 'ru'], ['class'=>'btn btn-success', 'style' => 'margin:5px']) ?>
		or
		<?= Html::a('English', ['set/language', 'language' => 'en'], ['class'=>'btn btn-primary', 'style' => 'margin:5px']) ?>
		
		<?php /* if(isset($_SESSION['language'])){echo 'ses - '.$_SESSION['language']; echo'<br>';} */?>
		<?php /* if(isset($_COOKIE['language'])){echo 'cook - '.$_COOKIE['language']; echo'<br>';} */?>
		<?php /* if(isset($_GET['language'])){echo 'GET - '.$_GET['language']; echo'<br>';} */?>
		
		<?= $content ?>
		
    </div>
	
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">
			+375 25 6268071 (viber)
			<br>halva202@gmail.com
			<br>
			<a href="http://vk.com/halva202"><img src="/images/icons/vk32.png" title="rss" alt="rss" /></a>
			<a href="https://www.facebook.com/halva202" target="blank"><img src="/images/icons/facebook-32x32.png" title="facebook" alt="facebook" /></a>
			<a href="https://www.youtube.com/channel/UCyYbgYd4iQD3qPlQf5SxZIg" target="blank"><img src="/images/icons/youtube-32x32.png" title="youtube" alt="youtube" /></a>
		</p>
		

        <p class="pull-right">
			&copy; Halva202 <?= date('Y') ?>
		</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
