<?php

namespace app\models;

use Yii;

class swiftmail
{
    function letter($subject = 'test subject', $message = 'test msg', $user_id = 1){
		$mailer = Yii::$app->mailer->compose();
		// $mailer->setTo('halva202@gmail.com')
		$mailer->setTo(['v.getpost@gmail.com','halva202@gmail.com'])
		->setFrom('halva202@yandex.ru')
		->setSubject($subject)
		->setTextBody($message);
		// attach files
		if(isset($_FILES)){
			if(isset($_FILES['UploadForm'])){
				foreach($_FILES['UploadForm']['name']['imageFiles'] as $nameFile){
					$mailer->attach('uploads/messages/'.$nameFile);
				}
			}
			
		}
		// /attach files
		$mailer->send();
	}
}
