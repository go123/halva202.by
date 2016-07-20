<?php

namespace app\models;

use Yii;
use app\models\Dicdescription;

// this file is used:
// frontend/views/site/index.php
// frontend/views/site/layouts/main.php

$session = Yii::$app->session;
$session->open();

class dictionary
{
	public static function takeTitleFromBD($titleOfView){
		$Dicdescription=new Dicdescription;
		$record = $Dicdescription->find()->where(['titleOfView' => $titleOfView])->one();
		if(dictionary::getLanguage()=='ru'){
			return $record->titleRU;
		}
		else{
			return $record->titleEN;
		}
	}
	public static function takeDescriptionFromBD($titleOfView){
		$Dicdescription=new Dicdescription;
		$record = $Dicdescription->find()->where(['titleOfView' => $titleOfView])->one();
		if(dictionary::getLanguage()=='ru'){
			return $record['ru'];
		}
		else{
			return $record['en'];
		}
	}
	public static function dictionaryEN(){
		$dictionary=[
			'hi'=>'Hi!',
			'name'=>"My name is Viktar.",
			
			'home'=>'Home',
			'content'=>'Content',
			'tutor'=>'Tutor',
			'proposals'=>'Opinion / Proposals',
			'web'=>'site/hosting',
			'contacts'=>'Contacts',
			'login'=>'Login',
			'logout'=>'Logout',
			
			// content
			'study'=>'study',
			'books'=>'books',
			'tables'=>'chemistry tables',
			'articles'=>'articles',
			'cooperation'=>'cooperation',
			'resume'=>'resume',
			'biography'=>'biography',
			'repositories'=>'repositories',
			'cloud'=>'cloud',
			'service'=>'service',
			'orderWebsite'=>'order website / hosting',
			'opinion'=>'opinion',
			'money'=>'payment details / donations',
		];
		return $dictionary;
	}
	public static function dictionaryRU(){
		$dictionary=[
			'hi'=>'Здравствуй!',
			'name'=>'Меня зовут Виктор.',
			
			'home'=>'Главная',
			'content'=>'Меню',
			'tutor'=>'Репетитор',
			'proposals'=>'Отзывы / Предложения',
			'web'=>'сайт/хостинг',
			'contacts'=>'Контакты',
			'login'=>'Авторизация',
			'logout'=>'Выход',
			
			// content
			'study'=>'учёба',
			'books'=>'учебники',
			'tables'=>'таблицы по химии',
			'books'=>'учебники',
			'articles'=>'статьи',
			'cooperation'=>'сотрудничество',
			'resume'=>'резюме',
			'biography'=>'биография',
			'repositories'=>'репозитории',
			'cloud'=>'облако',
			'service'=>'услуги',
			'orderWebsite'=>'Заказать сайт / хостинг',
			'opinion'=>'мнение',
			'money'=>'реквизиты для оплаты / пожертвований',
			
		];
		return $dictionary;
	}
	public static function getDictionary(){
		if(dictionary::getLanguage()=='ru'){
			return dictionary::dictionaryRU();
		}
		else{return dictionary::dictionaryEN();}
	}
	public static function getLanguage(){
		// look for language in SESSION
		if(isset($_SESSION['language'])){
			if($_SESSION['language']=='ru'){$language='ru';}
			else{$language='en';}
		}
		else{
			// look for language in COOKIE
			if(isset($_COOKIE['language'])){
				if($_COOKIE['language']=='ru'){$language='ru';}
				else{$language='en';}
			}
			else{
				// look for language in $_SERVER['HTTP_ACCEPT_LANGUAGE']
				$language = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
				dictionary::setLanguage($language);
			}
		}
		
		return $language;
	}
	public static function setLanguage($language='en'){
		if($language=='ru'){
			$_SESSION['language']='ru';
			$_COOKIE['language']='ru';
		}
		else{
			$_SESSION['language']='en';
			$_COOKIE['language']='en';
		}
		
	}
}