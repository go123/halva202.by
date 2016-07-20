<?php

namespace backend\controllers;

use Yii;
use app\models\Linen;
use app\models\LinenSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\Center;
use common\models\swiftmailplus;

/**
 * Line2Controller implements the CRUD actions for Line2 model.
 */
class LinenController extends Controller
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
     * Lists all Line2 models.
     * @return mixed
     */
    public function actionIndex()
    {
		$session = Yii::$app->session;
		$session->open();
		
		if(isset($_GET['customer_id'])){
			$_SESSION['customer_id']=$_GET['customer_id'];
		}
		
		// number of line
		if(!isset($_SESSION['nowN'])){
			$_SESSION['nowN']=1;
		}
		if(isset($_GET['futureN'])){
			$_SESSION['nowN'] = $_GET['futureN'];
		}
		// /number of line
		if(isset($_GET['lineParentN_id'])){
			$_SESSION['lineParentN_id'] = $_GET['lineParentN_id'];
		}
		
        $searchModel = new LinenSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Line2 model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		$session = Yii::$app->session;
		$session->open();
		
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Line2 model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		$session = Yii::$app->session;
		$session->open();
		
        $model = new Linen();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			
			// add new record in center
			$modelCenter=new Center;
			$modelCenter->title=$model->title;
			$modelCenter->insert();
				$idLastCenter = Yii::$app->db->getLastInsertID();
			// /add new record in center
			$model->center_id = $idLastCenter;
			
			$model->user_id = \Yii::$app->user->id;
			$model->timeOfStart = time();
			// lineParentN_id
			if(!isset($_SESSION['lineParentN_id'])){
				$_SESSION['lineParentN_id']=1;
				$lineParentN_id=$_SESSION['lineParentN_id'];
			}
			else{$lineParentN_id = $_SESSION['lineParentN_id'];}// for line2
			// /lineParentN_id
			$model->lineParentN_id = $lineParentN_id;
			
			$model->save();
			
////// hostinger24
			/* // отправить сообщение админу
			$modelMail = new swiftmailplus();
			$params = [
				// 'fio' => $fio,
				// 'flat' => $flat,
				// 'timeOfOrder' => date("H:i Y.m.d", $model->timeOfOrder),
				// 'supplier' => $titleSupplier,
				// 'title' => $model->title,
				// 'description' => $model->description,
				// 'nickname' => 'кличка',
				// 'phone' => '123-45',
				
			];
			$modelMail->letter($subject = 'Новая инфа', $viewOfLetter = 'newInfo', $params);
			// /отправить сообщение админу */
////// /hostinger24
			
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Line2 model.
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
			$modelCenterWhole=new Center;
			$modelCenter = $modelCenterWhole->findOne($model->center_id);
			$modelCenter->title=$model->title;
			$modelCenter->save();
			
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Line2 model.
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
     * Finds the Line2 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Line2 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Linen::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
