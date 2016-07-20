<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class TestController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
		return $this->render('index');
    }
	
	public function actionEmailgoogle()
    {
		Yii::$app->mailer->compose()
		->setFrom('halva202.info@gmail.com')
		->setTo('halva202@gmail.com')
		->setSubject('This is a test mail ' )
		->send();
		return $this->render('emailgoogle');
    }
    
}
