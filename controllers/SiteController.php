<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\helpers\ArrayHelper;
use app\models\Category;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
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
     * {@inheritdoc}
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
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
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


    public function actionTest(){
        $bot = new \telegramBot('694290658:AAEKzsAg6CKQ246Zf73h2V95qF4mrzVS11E');
        $chat_id = 562800654;

        //$keyb1 = (object)['text' => 'ok', 'url' => 'www.uz'];
        //$keyb2 = (object)['text' => 'cancel', 'url' => 'www.uz'];

        $keyb1=(object)['text' =>'Пройти тестирование'];
        $keyb2=(object)['text'=>'Личный кабинет'];

        $arr=array($keyb1, $keyb2);
        
      //$msg=(object)['text'=>'Hello world'];

        $bot->sendMessage($chat_id, 'Добро пожаловать в бот опросник!
        Выберите команду: ', null, false, null, json_encode([
            'keyboard' => [
              $arr
            ],
            
            
        ]));
    }

    public function actionTest2()
    {
        $bot = new \telegramBot('694290658:AAEKzsAg6CKQ246Zf73h2V95qF4mrzVS11E');
        $chat_id = 562800654;

        $categories=ArrayHelper::map(Category::find()->all(), 'id', 'name');
        $bot->sendMessage($chat_id, 'Добро пожаловать в бот опросник!
        Выберите команду: ', null, false, null, json_encode([
            'keyboard' => [
               $categories
            ],
            
            
        ]));
        

    }

    public function actionNotify($token){

    }
}

