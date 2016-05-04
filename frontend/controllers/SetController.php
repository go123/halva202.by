<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

use app\models\dictionary;

class SetController extends Controller
{
	
    public function actionLanguage()
    {
		// language
		$object_dictionary = new dictionary;
		if(isset($_GET['language'])){
			$object_dictionary->setLanguage($language=$_GET['language']);
		}
		// /language
		return $this->redirect(Yii::$app->request->referrer);
	}
	
}
