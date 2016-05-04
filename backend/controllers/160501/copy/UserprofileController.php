<?php

namespace backend\controllers;

use Yii;
use app\models\Userprofile;
use app\models\UserprofileSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\Lesson;
use app\models\LessonSection;
use app\models\LessonTopic;
// use app\models\Userprofile;

/**
 * UserprofileController implements the CRUD actions for Userprofile model.
 */
class UserprofileController extends Controller
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
     * Lists all Userprofile models.
     * @return mixed
     */
    public function actionIndex()
    {
		
		
		
		if(isset($_POST['idUser'])){
			
			$Userprofile = new Userprofile();
			$userprofile=$Userprofile::getUserprofile($id=$_POST['idUser']);
			// $userprofile=$Userprofile::getUserprofile(1);
			if(isset($_POST['text'])){
				// echo'<script>alert("hi");</script>';
				$name = Userprofile::findOne(['user_id'=>$id]);
				$name->tutorOpinion = $_POST['text'];
				// $name->filedname2 = "about information";
				$name->update();
			}
			if(isset($_POST['textLesson'])){
				// echo'<script>alert("hi");</script>';
				$name = Userprofile::findOne(['user_id'=>$id]);
				$name->$_POST['nameCol'] = $_POST['textLesson'];
				// $name->filedname2 = "about information";
				$name->update();
			}
			if(isset($_POST['textSection'])){
				$name = Userprofile::findOne(['user_id'=>$id]);
				$name->$_POST['nameCol'] = $_POST['textSection'];
				$name->update();
			}
			if(isset($_POST['textTopic'])){
				$name = Userprofile::findOne(['user_id'=>$id]);
				$name->$_POST['nameCol'] = $_POST['textTopic'];
				$name->update();
			}
			
			$listOfLessons=[];	
			$model = new Lesson();
			$lessons=$model::getLessons();
			$model4 = new Userprofile();
			$userprofile=$model4::getUserprofile($id=$_POST['idUser']);
			foreach($lessons as $lessonNote){	
				$lesson=[$lessonNote];	
				$model2 = new LessonSection();
				$lessonSections=$model2::getLessonSingleSections($lesson_id=$lessonNote->id);
				$listOfSections=[];
				foreach($lessonSections as $sectionNote){
					// $section=[$sectionNote->title];
					$section=[$sectionNote];
					$model3 = new LessonTopic();
					$lessonTopics=$model3::getLessonSingleSectionSingleTopics($lesson_section_id=$sectionNote->id);
					$listOfTopics=[];
					foreach($lessonTopics as $topic){
						array_push($listOfTopics, $topic);
					}
					array_push($section, $listOfTopics);
					array_push($listOfSections, $section);
				}	
				array_push($lesson, $listOfSections);
				array_push($lesson, $userprofile);
				array_push($listOfLessons, $lesson);
			}
			
			return $this->render('userContent', [
                'modelLessonPlus' => $listOfLessons,
				'userprofile' => $userprofile,
			]);
		}
		else{
			
			
		
        $searchModel = new UserprofileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
		
		}
    }

    /**
     * Displays a single Userprofile model.
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
     * Creates a new Userprofile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Userprofile();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Userprofile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Userprofile model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Userprofile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Userprofile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Userprofile::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
