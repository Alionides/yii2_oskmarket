<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\City;
use app\models\Users;
use app\models\Userskills;
use app\models\Skills;

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
        $users = Users::find()->all();
        //return  $users->city->name;
        return $this->render('index',['users'=>$users]);
    }

    public function actionGetuserdata(){
        if (Yii::$app->request->isAjax) {
          \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
           $users = Users::find()->all();
            return $users; 
        }
   }
    public function actionDeleteuser(){
        if (Yii::$app->request->isAjax) {
            $request = Yii::$app->request;
            $userid = $request->post('user_id');
            $user = Users::findOne($userid);
            $user->delete();
          return true;
        }
   }
    public function actionAddrandomuser(){
        if (Yii::$app->request->isAjax) {

            function RandomString($length) {
                $keys = array_merge(range('a', 'z'), range('A', 'Z'));
                $key='';
                for($i=0; $i < $length; $i++) {
                    $key .= $keys[array_rand($keys)];
                }
                return $key;
            }
        
            $randname =  RandomString(6);
            $lowername = strtolower($randname);
            $uppername = ucfirst($lowername);
            
            $city = City::find()->all();
            $city = array_rand($city,1);

            
            $user = new Users();
            $user->name = $uppername;
            $user->city_id = $city;
            $user->save();

            $insert_id = $user->id;

            $skills = Skills::find()->all();
            $count = count($skills);
            $skills = array_rand($skills,rand(2,7));

            $values = [];
            foreach($skills as $k=>$v){
                $values[$k] = ['user_id'=>$insert_id,'skill_id' => $v];
            }

            foreach ($values as $row) {               
                $addskill = new Userskills();
                $addskill->attributes = $row;
                $addskill->save();            
            }

           \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return $values;
        }
   }
    public function actionGetuserskills(){

        if (Yii::$app->request->isAjax) {
            $request = Yii::$app->request;
            $userid = $request->post('user_id');
          \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
           $users = Users::findOne($userid);
            return $users->userskillsname;
        }
   }
    public function actionGetcity(){
       
        if (Yii::$app->request->isAjax) {
            $request = Yii::$app->request;
            $cityid = $request->post('city_id');

            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
             $users = City::findOne($cityid);
              return $users; 
          }
           
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
}
