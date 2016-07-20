<?php

namespace common\models;

use Yii;

class swiftmailplus
{
    // function letter($subject = 'letter from halva202.by', $viewOfLetter = 'body', $params=[]){
	function letter($data){
		
		$mailer = Yii::$app->mailer->compose(
			$data['viewOfLetter'],
			$data['params']
		);
		
		// $mailer->setTo(['v.getpost@gmail.com','halva202@gmail.com'])
		$mailer->setTo('halva202@gmail.com')
		
		// ->setFrom('halva202@yandex.ru')
		->setFrom('halva202.info@gmail.com')
		
		->setSubject($data['subject'])
		
		// ->setTextBody($message)
		;
		
		/* // attach files
		if(isset($_FILES)){
			if(isset($_FILES['UploadForm'])){
				foreach($_FILES['UploadForm']['name']['imageFiles'] as $nameFile){
					$mailer->attach('uploads/messages/'.$nameFile);
				}
			}
		}
		// /attach files */
		
		$mailer->send();
	}
}
