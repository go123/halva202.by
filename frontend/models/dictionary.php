<?php

namespace app\models;

use Yii;

$session = Yii::$app->session;
$session->open();

class dictionary{
	function dictionaryRU(){
		$dictionary=[
			'hi'=>'Здравствуй!',
			'name'=>'Меня зовут Виктор.',
			
			'home'=>'Главная',
			'tutor'=>'Репетитор',
			'cooperation'=>'Сотрудничество',
			'orderWebsite'=>'Заказать сайт',
			'contacts'=>'Контакты',
			'articles'=>'Статьи',
			'biography'=>'Биография',
			'login'=>'Авторизация',
			'logout'=>'Выход',
		];
		return $dictionary;
	}
	function dictionaryEN(){
		$dictionary=[
			'hi'=>'Hi!',
			'name'=>"My name is Viktar. It's my a new site and I begin to translate content)",
			
			'home'=>'Home',
			'tutor'=>'Tutor',
			'cooperation'=>'Cooperation',
			'orderWebsite'=>'Order website',
			'contacts'=>'Contacts',
			'articles'=>'Articles',
			'biography'=>'Biography',
			'login'=>'Login',
			'logout'=>'Logout',
		];
		return $dictionary;
	}
	function getDictionary(){
		if($this->getLanguage()=='ru'){
			return $this->dictionaryRU();
		}
		else{return $this->dictionaryEN();}
	}
	function getLanguage(){
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
				$this->setLanguage($language);
			}
		}
		
		return $language;
	}
	function setLanguage($language='en'){
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