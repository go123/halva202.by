<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
	
	'homeUrl' => '/',
	
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
				'' => 'site/index',
                '<action>'=>'site/<action>',
            ],
        ],
		
		'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
				'facebook' => [
                              'class' => 'yii\authclient\clients\Facebook',
                              'authUrl' => 'https://www.facebook.com/dialog/oauth?display=popup',
                              'clientId' => '265960967090090',
                              'clientSecret' => 'a811b1a84bdf7b7befbb2d82a00a0d35',
                            ],
				/* 'vkontakte' => [
					'class' => 'yii\authclient\clients\VKontakte',
					'clientId' => '5477917',
					'clientSecret' => 'aRlkTYlGyLt9DPIKbwzp',
				],
				'google' => [
                  'class' => 'yii\authclient\clients\GoogleOAuth',
                  'clientId' => '1099492334766-4pqnqkt3v2a1e9ks2e6jmhlo8oc2tv2i.apps.googleusercontent.com',
                  'clientSecret' => 'J6stZa1PXwvsKdJQjWuP67XX',
               ],
			   'yandex' => [
                  'class' => 'yii\authclient\clients\YandexOAuth',
                  'clientId' => '35ec82c7136e421297ecbf3bf226383e',
                  'clientSecret' => 'yandex_client_secret',
              ], */
            ],
        ],
		
		
		'assetManager' => [
             'basePath' => '@webroot/assets',
             'baseUrl' => '@web/assets'
        ],
		'request' => [
            'baseUrl' => ''
        ],
       
    ],
    'params' => $params,
];
