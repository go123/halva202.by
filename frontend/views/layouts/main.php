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
	<meta name='yandex-verification' content='73e7cbfc3d02334e' />
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
		if(\Yii::$app->user->identity->id==1){
			$menuItems[] = ['label' => 'asAdmin', 'url' => ['/../../admin']];
			$menuItems[] = ['label' => 'forMe', 'items' => [
				['label' => 'auth fb', 'url' => 'http://www.satusoftware.com/yii2-framework-login-with-facebook/'],
				['label' => 'dic_description', 'url' => ['/dicdescription/index']]
			]
			
			];
		}
	}
	
	$menuItems[] = ['label' => $dictionary['home'], 'url' => ['/site/index']];
	$menuItems[] = ['label' => $dictionary['content'], 'url' => ['site/content'], 'items' => [
		['label' => $dictionary['study'], 'url' => 'https://yadi.sk/d/ijt3okO9q3aqR', 'items' => [
            ['label' => $dictionary['books'], 'url' => 'https://yadi.sk/d/ijt3okO9q3aqR'],
            ['label' => $dictionary['tables'], 'url' => 'http://repetitor.github.io/chemistry'],
        ]],
		['label' => $dictionary['articles'], 'url' => ['site/articles']],
		['label' => 'volleyball', 'url' => ['site/volleyball']],
		// ['label' => $dictionary['cooperation'], 'url' => ['site/cooperation']],
		['label' => $dictionary['resume'], 'items' => [
            ['label' => 'программист - tut.by', 'url' => 'https://jobs.tut.by/applicant/resumes/view?resume=4d35b7f6ff0214120c0039ed1f59454247344b'],
            ['label' => 'programmer - upwork.com', 'url' => 'https://www.upwork.com/freelancers/~0106dc02a6699ca661'],
			['label' => 'репетитор - uchim.biz', 'url' => 'http://uchim.biz/board/0-0-11664-0-17'],
        ]],
		
		['label' => $dictionary['biography'], 'url' => ['site/biography']],
		['label' => $dictionary['repositories'], 'url' => 'https://github.com/halva202'],
		['label' => $dictionary['cloud'], 'url' => 'https://yadi.sk/d/NXMIqBYLoyb7b'],
		['label' => $dictionary['service'], 'url' => ['site/tutor'], 'items' => [
            ['label' => $dictionary['tutor'], 'url' => ['site/tutor']],
            ['label' => $dictionary['orderWebsite'], 'url' => 'http://cvr.by/'],
        ]],
		// ['label' => $dictionary['opinion'], 'url' => ['site/opinion']],
		// ['label' => $dictionary['money'], 'url' => ['site/money']],
		['label' => 'service payment / donation', 'url' => ['site/donation']],
		['label' => $dictionary['proposals'], 'url' => ['site/proposals']],
		// ['label' => $dictionary['contacts'], 'url' => ['site/contacts']],
        ]
	];
	if (!Yii::$app->user->isGuest){
			$menuItems[] = ['label' => 'Go:)', 'url' => ['/linen/index?lineParentN_id=1&futureN=2'], 
				'items' => [
					['label' => 'structure', 'url' => ['/linen/index?lineParentN_id=1&futureN=2']],
					['label' => 'results', 'url' => ['/result/index']],
				],
			];
	}
	$menuItems[] = ['label' => $dictionary['tutor'], 'url' => ['site/tutor', 'tag' => 'new']];
	$menuItems[] = ['label' => $dictionary['web'], 'url' => 'http://cvr.by/'];
	$menuItems[] = ['label' => $dictionary['contacts'], 'url' => ['/site/contactmy']];
	
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
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
		
		Choose your preferred language for displaying pages:
		<?= Html::a('Русский', ['set/language', 'language' => 'ru'], ['class'=>'btn btn-success', 'style' => 'margin:5px']) ?>
		or
		<?= Html::a('English', ['set/language', 'language' => 'en'], ['class'=>'btn btn-primary', 'style' => 'margin:5px']) ?>
		

		
		<?= $content ?>
<!-- Yandex.Metrika informer -->
<a href="https://metrika.yandex.by/stat/?id=37527460&amp;from=informer"
target="_blank" rel="nofollow"><img src="https://informer.yandex.ru/informer/37527460/3_1_FFFFFFFF_EFEFEFFF_0_pageviews"
style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" onclick="try{Ya.Metrika.informer({i:this,id:37527460,lang:'ru'});return false}catch(e){}" /></a>
<!-- /Yandex.Metrika informer -->

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter37527460 = new Ya.Metrika({
                    id:37527460,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/37527460" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
		
    </div>
<script type="text/javascript">
  VK.init({
    apiId: 5477917
  });
</script>
<div id="vk_auth"></div>
<script type="text/javascript">
 VK.Widgets.Auth('vk_auth', {});
</script>	
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
