<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use app\modules\students\models\Students;
use yii\web\Session;

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
                'only' => ['logout'],
                'rules' => [
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();

        if ($model->load($post=Yii::$app->request->post())) {
           $role =  $post['LoginForm']['selected'];
           $username = $post['LoginForm']['username'];
           $password = sha1($post['LoginForm']['password']);
            
            if ($role == "1" || $role == "2" ||$role == "3" ){
                $user = User::find()
                    ->where(['username'=>$username])
                    ->one();
                $roleArray = explode(",", $user->role);
            } else if($role == "4"){
                $user = Students::find()
                        ->where(['studentID'=>$username])
                        ->one();
            }else{
                Yii::$app->getSession()->setFlash('error', 'Please select one of the options to login.');
            }

            
            $session = new Session;
            $session->open();
            if($role == "1" && in_array("1", $roleArray) && $password == $user->password){
                
                $session["role"] = "admin";
                // var_dump($session["role"]);exit();  
                $model->login();
            
                return $this->redirect(['students/adminhome']);

            }elseif ($role == "2" && in_array("2", $roleArray) && $password == $user->password) {
                $session["role"] = "fypCoordinator";
                $model->login();
                return $this->redirect(['students/coordinatorhome']);

            }elseif ($role == "3" && in_array("3", $roleArray) && $password == $user->password) {
                $session["role"] = "lecturer";
                $model->login();

                return $this->redirect(['students/lecturerhome']);
                
           }elseif($role == "4"){
                $session["role"] = "student";
                $model->login();
                return $this->redirect(['students/home']);
           }else{

                Yii::$app->getSession()->setFlash('error', 'You are forbidden to login to this site.');
           }
     


          
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
