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

use app\models\Ordermy;

use app\models\Userprofile;

use app\models\dictionary;
// use app\models\Dicdescription;

use common\models\swiftmailplus;

use app\models\Result;
use yii\data\Pagination;


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
			// 160527
			'auth' => [
				'class' => 'yii\authclient\AuthAction',
				'successCallback' => [$this, 'successCallback'],
			],
			// /160527
        ];
    }
	
	public function successCallback($client)
	{
		$attributes = $client->getUserAttributes();
			// user login or signup comes here
			/*
			Checking facebook email registered yet?
			Maxsure your registered email when login same with facebook email
			die(print_r($attributes));
			*/
			
			// $user = \common\modules\auth\models\User::find()->where([’email’=>$attributes[’email’]])->one();
			$user = \common\models\User::find()->where(['email'=>$attributes['email']])->one();
			if(!empty($user)){
				Yii::$app->user->login($user);
			
			}else{
				// Save session attribute user from FB
				$session = Yii::$app->session;
				$session['attributes']=$attributes;
				// redirect to form signup, variabel global set to successUrl
				$this->successUrl = \yii\helpers\Url::to(['signup']);
			}
	}
	public $successUrl = 'Success';

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
		// language
		$object_dictionary = new dictionary;
		$dictionary=$object_dictionary->getDictionary();
		// /language
		
		// for showing 3 last results 
		$query = Result::find()->where(['customer_id'=> \Yii::$app->user->id]);

        $pagination = new Pagination([
            'defaultPageSize' => 3,
            'totalCount' => $query->count(),
        ]);

        $marks = $query->orderBy('timeLast desc')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
		// /for showing 3 last results
		
		// index/hi
		$aboutMe = dictionary::takeDescriptionFromBD('site/index/hi');
		// /index/hi
				
		return $this->render('index', [
			'dictionary' => $dictionary,
            'marks' => $marks,
            'pagination' => $pagination,
            'aboutMe' => $aboutMe,
        ]);
    }
	
	/* function actionContent(){
		return $this->render('content');
	}
	function actionStudy(){
		return $this->render('study');
	} */

	
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
					
					// email
					$modelMail = new swiftmailplus();
					$params = [
						// 'title' => $model->title,
						// 'nickname' => 'кличка',
						
					];
					// $modelMail->letter($subject = 'Новая инфа', $viewOfLetter = 'body', $params);
					$data=[
						'subject' => 'Новый пользователь',
						'viewOfLetter' => 'body',
						'params' => $params,
					];
					$modelMail->letter($data);
					// /email
					
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
		//language
		if(!isset($session)){$session = Yii::$app->session;$session->open();}else{$test='session';}
			if(isset($_GET['language'])){
				if($_GET['language']=='ru'){
					$session->set('language', 'ru');
				}
				if($_GET['language']=='en'){
					$session->set('language', 'en');
					echo'en1';
				}
			}
			else{
				$language = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
				if($language=='ru' or $language=='be' or $language=='uk'){
					$session->set('language', 'ru');
					//language
					if(!isset($session)){$session = Yii::$app->session;$session->open();}
						if(isset($_GET['language'])){
							if($_GET['language']=='ru'){
								$session->set('language', 'ru');
								$test='ru1';
							}
							if($_GET['language']=='en'){
								$session->set('language', 'en');
								$test='en1';
							}
						}
						else{
							$language = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
							if($language=='ru' or $language=='be' or $language=='uk'){
								$session->set('language', 'ru');
								$test='ru2';
							}
							else{
								$session->set('language', 'en');
								$test='en2';
							}
						}
				}
			}
			$test='test';
		return $this->render('contactmy');
		// $this->render('login', [
                // 'model' => $model,
	}
	
	public function actionOther()
	{
		session_start();
		return $this->render('other');
	}
	
	public function actionTutor()
    {
		$model = new Ordermy();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			// email
			$modelMail = new swiftmailplus();
			$params = [
				// 'title' => $model->title,
				// 'nickname' => 'кличка',
				
			];
			// $modelMail->letter($subject = 'Новая инфа', $viewOfLetter = 'body', $params);
			$data=[
				'subject' => 'Новый заказ',
				'viewOfLetter' => 'body',
				'params' => $params,
			];
			$modelMail->letter($data);
			// /email
            return $this->render('tutorPost', [
                'model' => $model,
            ]);
        } else {
            return $this->render('tutor', [
                'model' => $model,
            ]);
        };
    }
	public function actionCooperation()
    {
        return $this->render('cooperation');
		if(!isset($_SESSION['language'])){session_start();}
    }
	public function actionArticles()
    {
        return $this->render('articles');
		// echo'articles';
    }
	public function actionWebsite()
    {
        return $this->render('website');
		// echo'articles';
    }
	public function actionBiography()
    {
        return $this->render('biography');
		// echo'articles';
    }
	public function actionPupils()
    {
        return $this->render('pupils');
		// echo'articles';
    }
	public function actionJournal()
    {
        return $this->render('journal');
    }
	public function actionVolleyball()
    {
        return $this->render('volleyball');
    }
	public function actionDonation()
    {
        return $this->render('donation');
    }
	public function actionProposals()
    {
        return $this->render('proposals');
    }
}
