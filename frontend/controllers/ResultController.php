<?php

namespace frontend\controllers;

use Yii;
use app\models\Result;
use app\models\ResultSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


use common\models\swiftmailplus;

/**
 * ResultController implements the CRUD actions for Result model.
 */
class ResultController extends Controller
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

    /**
     * Lists all Result models.
     * @return mixed
     */
    public function actionIndex()
    {
		$session = Yii::$app->session;
		$session->open();
		
		$create='wait';// for button create
		if(isset($_GET['center_id'])){
			$_SESSION['arrayForSearch']=['customer_id'=>\Yii::$app->user->id, 'center_id'=>$_GET['center_id']];
			
			// create result?
			$modelForCreate = new Result;
			$res = $modelForCreate->find()->where([
				'customer_id'=>\Yii::$app->user->id, 
				'supplier_id'=>\Yii::$app->user->id, 
				'center_id'=>$_GET['center_id'],
			])->one();
			if($res!=null){$create='wait';}
			else{
				$create='yes';
				$_SESSION['center_id']=$_GET['center_id'];
			}
			// /create result?
			
		}
		else{$_SESSION['arrayForSearch']=['customer_id'=>\Yii::$app->user->id];}
		
        $searchModel = new ResultSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'createButton' => $create,
        ]);
    }

    /**
     * Displays a single Result model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Result model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		$session = Yii::$app->session;
		$session->open();
		
        $model = new Result();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			// update some info in table
			$model->center_id = $_SESSION['center_id'];
			$model->customer_id = Yii::$app->user->id;
			$model->supplier_id = Yii::$app->user->id;
			$model->timeLast = time();
			$model->markMax = $model->mark;
			$model->timeMax = $model->timeLast;
			
			$model->save();
			// /update some info in table
			
			// email
			$modelMail = new swiftmailplus();
			$params = [
				// 'title' => $model->title,
				// 'nickname' => 'кличка',
				
			];
			// $modelMail->letter($subject = 'Новая инфа', $viewOfLetter = 'body', $params);
			$data=[
				'subject' => 'Добавление результата',
				'viewOfLetter' => 'body',
				'params' => $params,
			];
			$modelMail->letter($data);
			// /email
			
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Result model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		$session = Yii::$app->session;
		$session->open();
		
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			
			$model->timeLast = time();
			$model->save();
			
			if($model->mark > $model->markMax){
				
				$model->markMax = $model->mark;
				$model->timeMax = $model->timeLast;
				
				$model->save();
			}
			
			// email
			$modelMail = new swiftmailplus();
			$params = [
				// 'title' => $model->title,
				// 'nickname' => 'кличка',
				
			];
			// $modelMail->letter($subject = 'Новая инфа', $viewOfLetter = 'body', $params);
			$data=[
				'subject' => 'Изменение результата',
				'viewOfLetter' => 'body',
				'params' => $params,
			];
			$modelMail->letter($data);
			// /email
			
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Result model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
		$session = Yii::$app->session;
		$session->open();
		
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Result model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Result the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Result::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
