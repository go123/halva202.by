<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use app\models\Lesson;
use app\models\LessonSection;
use app\models\LessonTopic;

use app\models\Userprofile;
use app\models\content;
use app\models\User;

// use Yii;
use app\models\Testuserprofile;
use yii\data\ActiveDataProvider;
// use yii\web\Controller;
use yii\web\NotFoundHttpException;
// use yii\filters\VerbFilter;


/**
 * Site controller
 */
class TutorController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup', 'testemail'],
                'rules' => [
                    [
                        'actions' => ['signup','testemail'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

	// pupil go на свою page 
	function actionIndex2(){
		$obj_content = new content;
		$content=$obj_content->getContent_for_pupil($idPupil=Yii::$app->user->id);
		$obj_user = new User;
		$user=$obj_user->getUser($idPupil=Yii::$app->user->id);
		$obj_userprofile = new Userprofile;
		$userprofile=$obj_userprofile->getUserprofile($idPupil=Yii::$app->user->id);
		return $this->render('index2', [
            'contentLessons' => $content,
            'user' => $user,
            'userprofile' => $userprofile,
        ]);
	}
	function actionOpinion(){
		if(isset($_GET['about'])){
			if($_GET['about']=='pupil'){
				$_SESSION['modelForFindModel']='app\models\Userprofile';
				Yii::$app->response->cookies->add(new \yii\web\Cookie([
					'name' => 'modelForFindModel',
					'value' => 'app\models\Userprofile'
				]));
				$title='Profile-of-pupil';
				
			}
			
			if($_GET['about']=='lesson'){
				$_SESSION['modelForFindModel']='app\models\Lesson';
				Yii::$app->response->cookies->add(new \yii\web\Cookie([
					'name' => 'modelForFindModel',
					'value' => 'app\models\Lesson'
				]));
				$title='lesson';
				
			}
			
			if(isset($_SESSION['modelForFindModel'])){$wayToModel = new $_SESSION['modelForFindModel'];}
			else{$wayToModel = new $_COOKIE['modelForFindModel'];}
			$dataProvider = new ActiveDataProvider([
				'query' => $wayToModel->find()->where("`user_id`=".\Yii::$app->user->id),
				// 'query' => Userprofile::find()->where("`user_id`=".\Yii::$app->user->id),
			]);

			return $this->render('opinion', [
				'dataProvider' => $dataProvider,
				'title' => $title,
			]);
		}
		else echo 'opinion';
	}
	protected function findModel($id)
    {
		// session_start();
		// $_SESSION['modelForFindModel']='app\models\Userprofile';
		// $lala=Yii::$app->request->cookies['modelForFindModel'];
		$lala = Yii::$app->request->cookies->getValue('modelForFindModel');
		$wayToModel = new $lala;
		// if (($model = Userprofile::findOne($id)) !== null) {
		if (($model = $wayToModel->findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
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
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
		// echo'<script>alert("hi");</script>';
		$Userprofile = new Userprofile();
		$userprofile=$Userprofile::getUserprofile($id=Yii::$app->user->id);
		// $userprofile=$Userprofile::getUserprofile(1);
		if(isset($_POST['text'])){
			// echo'<script>alert("hi");</script>';
			$name = Userprofile::findOne(['user_id'=>$id]);
			$name->pupilOpinion = $_POST['text'];
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
		
		
		$contentOfLessons=[];	
		$model = new Lesson();
		$lessons=$model::getLessons();
		$model4 = new Userprofile();
		$userprofile=$model4::getUserprofile($id=Yii::$app->user->id);
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
			array_push($contentOfLessons, $lesson);
		}
		

		/* $listOfLessons=[
			[
				'name1', 
				[
					['sec1',
						['top1','top2'],
					],
					['sec2',
						['top1','top2'],
					],
					['sec3',
						['top1','top2'],
					],
				]
			],
			[
				'name2', 
				[
					['sec1',
						['top1','top2'],
					],
					['sec2',
						['top1','top2'],
					],
					['sec3',
						['top1','top2'],
					],
				]
			],
		]; */
		
		/* if (Yii::$app->user->isGuest){
			return $this->render('index', [
                'modelLessonPlus' => $listOfLessons,
				'userprofile' => $userprofile,
            ]);
		}
		else{
			return $this->render('about');
		} */
		
		return $this->render('index', [
                'modelLessonPlus' => $contentOfLessons,
				'userprofile' => $userprofile,
        ]);
    }

	public function actionTest2()
    {
		$Userprofile = new Userprofile();
		$userprofile=$Userprofile::getUserprofile($id=Yii::$app->user->id);
		// $userprofile=$Userprofile::getUserprofile(1);
		if(isset($_POST['text'])){
			// echo'<script>alert("hi");</script>';
			$name = Userprofile::findOne(['user_id'=>$id]);
			$name->pupilOpinion = $_POST['text'];
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
		
		
			
		
		$model4 = new Userprofile();
		$userprofile=$model4::getUserprofile($id=Yii::$app->user->id);
		
		// create array for posting in view
		$arrayLessons=[];
		$modelLesson = new Lesson();
		$lessons=$modelLesson::getLessons();
		foreach($lessons as $lessonNote){	
			$arrayLesson=[$lessonNote->title];
			
			$arraySections=[];
			$modelLessonSection = new LessonSection();
			$lessonSections=$modelLessonSection::getLessonSingleSections($lesson_id=$lessonNote->id);
			foreach($lessonSections as $sectionNote){
				$section=[$sectionNote->title];
				// $section=[$sectionNote];
				/* $model3 = new LessonTopic();
				$lessonTopics=$model3::getLessonSingleSectionSingleTopics($lesson_section_id=$sectionNote->id);
				$listOfTopics=[];
				foreach($lessonTopics as $topic){
					array_push($listOfTopics, $topic);
				}
				array_push($section, $listOfTopics); */
				array_push($arraySections, $section);
			}	
			array_push($arrayLesson, $arraySections);
			// array_push($lesson, $userprofile);
			
			
			
			array_push($arrayLessons, $arrayLesson);
			
			/* var_dump($lesson);
			echo'<br>';echo'<br>';
			
			echo 'lessonNote - ';
			var_dump($lessonNote);
			echo'<br>';echo'<br>'; */
		}
		// /create array for posting in view
		var_dump($arrayLessons);
		
		
		echo'<br>';echo'<br>';
		// var_dump($lessons);
		// echo'<br>';echo'<br>';
		/* return $this->render('test2', [
                // 'modelLessonPlus' => $contentOfLessons,
				// 'userprofile' => $userprofile,
        ]); */
	}
    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
				//дополню данными таблицу userprofile
					$idUser = Yii::$app->db->getLastInsertID();
					$model2=new Userprofile;
					$model2->user_id = $idUser;
					$model2->insert();
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
		
	public function actionContactmy()
	{
		return $this->render('contactmy');
	}
	
	public function actionOther()
	{
		return $this->render('other');
	}
}
