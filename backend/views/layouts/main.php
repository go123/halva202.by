<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

// use app\models\dictionary2;
// $object_dictionary = new dictionary2;
// $dictionary=$object_dictionary->getDictionary();

$session = Yii::$app->session;
$session->open();

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title>Halva202 - admin</title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
	
	if (!Yii::$app->user->isGuest){
		if(\Yii::$app->user->identity->id==1){
			$menuItems[] = ['label' => 'asUser', 'url' => ['/../']];
			$menuItems[] = ['label' => 'Userprofiles', 'url' => ['/userprofile/index']];
			$menuItems[] = ['label' => 'result', 'url' => ['/result/index']];
			$menuItems[] = ['label' => 'Add user', 'url' => ['/site/signup']];
			$menuItems[] = [
				'label' => 'old', 'items' => [
					['label' => 'Home', 'url' => ['/site/index']],
					['label' => 'notebook', 'url' => ['/notebook/index']],
					['label' => 'Listsql', 'url' => ['/listsql/index']],
					['label' => 'Словарь', 'url' => ['/dictionary/index']],
					['label' => 'Userprofiles', 'url' => ['/userprofile/index']],
					['label' => 'Добавить пользователя', 'url' => ['/site/signup']],
					['label' => 'Content', 'url' => ['/content/index']],
					['label' => 'Result', 'url' => ['/result/index']],
				]
			];
		}
	}
	
	
	
	
    /* $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
		['label' => 'notebook', 'url' => ['/notebook/index']],
		['label' => 'Listsql', 'url' => ['/listsql/index']],
		['label' => 'Словарь', 'url' => ['/dictionary/index']],
		['label' => 'Userprofile', 'url' => ['/userprofile/index']],
		['label' => 'Добавить пользователя', 'url' => ['/site/signup']],
		// ['label' => 'Lesson', 'url' => ['/lesson/index']],
		// ['label' => 'Sections', 'url' => ['/lessonsection/index']],
		// ['label' => 'Topics', 'url' => ['/lessontopic/index']],
    ]; */
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
		// $menuItems[] = ['label' => 'asUser', 'url' => ['/../']];
		// $menuItems[] = ['label' => 'Content', 'url' => ['/content/index']];
		
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
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
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
