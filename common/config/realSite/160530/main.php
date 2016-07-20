<?php
return [
    'language' => 'ru-RU',
	'timeZone' => 'Europe/Minsk',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
		'authManager' => [
			'class' => 'yii\rbac\PhpManager',
			'defaultRoles' => ['user','moder','admin'], //здесь прописываем роли
			//зададим куда будут сохраняться наши файлы конфигураций RBAC
			'itemFile' => '@common/components/rbac/items.php',
			'assignmentFile' => '@common/components/rbac/assignments.php',
			'ruleFile' => '@common/components/rbac/rules.php'
		],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
		// чтобы свои формы работали
		'request' => [
            'enableCsrfValidation' => false,
			'enableCookieValidation' => false
        ],
		// / чтобы свои формы работали
		/* 'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ], */
    ],
];
