<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
// use common\models\LoginForm;
use backend\models\LoginForm;
use yii\filters\VerbFilter;

use backend\models\SignupForm;

// use app\models\Userprofile2;
use app\models\Userprofile;

use yii\db\Migration;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'signup'],
                        'allow' => true,
                        // 'roles' => ['@'],
						'roles' => ['moder'],
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
        ];
    }

    public function actionIndex()
    {
        // return $this->render('index');
		return $this->redirect(\Yii::$app->urlManager->createUrl('/userprofile/index'));
    }

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

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
	
	public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
				
				//дополню данными таблицу userprofile
					// узнаем запись с последним (только что вставленным) id 
					$idUser = Yii::$app->db->getLastInsertID();
					// insert в другую таблицу
					// $model2=new Userprofile2;
					$model2=new Userprofile;
					$model2->user_id = $idUser;
					// $model2->usernameUser = $username;
					$model2->insert();
					
					/* // add new columns to result
					$migration = new Migration;
					
					$migration->addColumn ( $table='result', $column='comment_TutorAboutPupil'.$idUser, $type='TEXT NOT NULL' );
					$migration->addColumn ( $table='result', $column='mark_TutorAboutPupil'.$idUser, $type='INT NOT NULL' );
					$migration->addColumn ( $table='result', $column='date_TutorAboutPupil'.$idUser, $type='DATE NOT NULL' );
					
					$migration->addColumn ( $table='result', $column='commentMaximum_TutorAboutPupil'.$idUser, $type='TEXT NOT NULL' );
					$migration->addColumn ( $table='result', $column='markMaximum_TutorAboutPupil'.$idUser, $type='INT NOT NULL' );
					$migration->addColumn ( $table='result', $column='dateMaximum_TutorAboutPupil'.$idUser, $type='DATE NOT NULL' );
					
					
					$migration->addColumn ( $table='result', $column='comment_Pupil'.$idUser.'AboutTutor', $type='TEXT NOT NULL' );
					$migration->addColumn ( $table='result', $column='mark_Pupil'.$idUser.'AboutTutor', $type='INT NOT NULL' );
					$migration->addColumn ( $table='result', $column='date_Pupil'.$idUser.'AboutTutor', $type='DATE NOT NULL' );
					
					$migration->addColumn ( $table='result', $column='commentMaximum_Pupil'.$idUser.'AboutTutor', $type='TEXT NOT NULL' );
					$migration->addColumn ( $table='result', $column='markMaximum_Pupil'.$idUser.'AboutTutor', $type='INT NOT NULL' );
					$migration->addColumn ( $table='result', $column='dateMaximum_Pupil'.$idUser.'AboutTutor', $type='DATE NOT NULL' );
					
					
					$migration->addColumn ( $table='result', $column='comment_Pupil'.$idUser.'AboutPupil'.$idUser, $type='TEXT NOT NULL' );
					$migration->addColumn ( $table='result', $column='mark_Pupil'.$idUser.'AboutPupil'.$idUser, $type='INT NOT NULL' );
					$migration->addColumn ( $table='result', $column='date_Pupil'.$idUser.'AboutPupil'.$idUser, $type='DATE NOT NULL' );
					
					$migration->addColumn ( $table='result', $column='commentMaximum_Pupil'.$idUser.'AboutPupil'.$idUser, $type='TEXT NOT NULL' );
					$migration->addColumn ( $table='result', $column='markMaximum_Pupil'.$idUser.'AboutPupil'.$idUser, $type='INT NOT NULL' );
					$migration->addColumn ( $table='result', $column='dateMaximum_Pupil'.$idUser.'AboutPupil'.$idUser, $type='DATE NOT NULL' );
					
					
					$migration->addColumn ( $table='result', $column='moderationPupil'.$idUser, $type='INT NOT NULL' );
					// /add new columns to result */
				
				return $this->render('userCreated');
				
                /* if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                } */
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }
}
