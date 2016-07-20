<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=yii2_repka',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
        /* 'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ], */
		/* 'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
			'viewPath' => '@common/mail',
			'transport' => [
				'class' => 'Swift_SmtpTransport',
				'host' => 'smtp.yandex.ru',
				'username' => 'halva202@yandex.ru',
				'password' => 'vitik145145145',
				'port' => '465',
				'encryption' => 'ssl',
			],
        ], */
		'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
			'viewPath' => '@common/mail',
			'transport' => [
				'class' => 'Swift_SmtpTransport',
				'host' => 'smtp.gmail.com',
				// 'host' => '173.194.65.108',//doesn't work
				// gmail-smtp-msa.l.google.com
				// 'host' => '64.233.166.108',
				'username' => 'halva202.info@gmail.com',
				'password' => 'vitik123',
				'port' => '587',
				'encryption' => 'tls',
				// 'port' => '465',
				// 'encryption' => 'ssl',
				// STARTTLS
			],
        ],
		
    ],
];
