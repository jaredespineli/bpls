<?php

namespace app\controllers;


use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Taxpayer;
use app\models\PasswordForm;
use app\models\User;
use app\models\Transaction;
//use mPDF;


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
                        'actions' => ['logout', 'changepassword'],
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
        if (Yii::$app->user->isGuest) {
            return $this->render('index');
        }else{
            $user_type = trim(Yii::$app->user->identity->user_type, " ");

            if($user_type == 'Admin'){
                $this->layout = 'admin';                
            }else if($user_type === 'Assessor'){
                $this->layout = 'assessor';
            }else if($user_type === 'Treasurer'){
                $this->layout = 'treasurer';
            }else if ($user_type === 'Taxpayer'){
                $this->layout = 'taxpayer';
            }else if ($user_type === 'BPLO'){
                $this->layout = 'bplo';
            }     
        } 

        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {        
        $model = new LoginForm();

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        if ($model->load(Yii::$app->request->post()) && $model->login()) {                    

            // $modelTransaction = new Transaction();
            // date_default_timezone_set('Asia/Manila');
            // $modelTransaction->date_time = date('Y-m-d H:i:s');
            // $modelTransaction->user = $model->username;
            // $modelTransaction->message = 'Login';
            // $modelTransaction->save();

            return $this->goBack();
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Signup action.
     *
     * @return string
     */
    public function actionSignup()
    {
        $model = new Taxpayer();

        if ($model->load(Yii::$app->request->post())) {
            $model->save();

            $modeluser = new User();
            //$modeluser->user_id = $model->user_id;
            $modeluser->username = $model->taxpayer_username;
            $modeluser->password = $model->taxpayer_password;
            $modeluser->first_name = $model->taxpayer_fname;
            $modeluser->middle_name = $model->taxpayer_mname;
            $modeluser->last_name = $model->taxpayer_lname;
            $modeluser->suffix_name = $model->taxpayer_suffix_name;
            $modeluser->full_name = trim($model->taxpayer_fname," "). " " .trim($model->taxpayer_mname," "). " " .trim($model->taxpayer_lname," "). " " .trim($model->taxpayer_suffix_name," ");
            $modeluser->authKey = $this->generateRandomString(32);
            $modeluser->user_type = 'Taxpayer';
            $modeluser->save();  
                      
            return $this->redirect(['index']);
        }

            else{
                return $this->render('signup', ['model' => $model]); 
            }
    }

    public function generateRandomString($length) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
        return $randomString;
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        // $modelTransaction = new Transaction();
        // date_default_timezone_set('Asia/Manila');
        // $modelTransaction->date_time = date('Y-m-d H:i:s');
        // $modelTransaction->user = Yii::$app->user->identity->username;
        // $modelTransaction->message = 'Logout';
        // $modelTransaction->save();

        Yii::$app->user->logout();

        return $this->goHome();
    }


    public function actionChangepassword()
    {
            $user_type = trim(Yii::$app->user->identity->user_type, " ");

            if($user_type == 'Admin'){
                $this->layout = 'admin';                
            }else if($user_type === 'Assessor'){
                $this->layout = 'assessor';
            }else if($user_type === 'Treasurer'){
                $this->layout = 'treasurer';
            }else if ($user_type === 'Taxpayer'){
                $this->layout = 'taxpayer';
            }else if ($user_type === 'BPLO'){
                $this->layout = 'bplo';
            }         

        $model = new PasswordForm();

        $modeluser = User::findByUsername(Yii::$app->user->identity->username);
      
        if($model->load(Yii::$app->request->post())){
            if($model->validate()){
                try{
                    $tempPw = $_POST['PasswordForm']['newpass'];
                    $modeluser->password = md5($tempPw);
                    if($modeluser->save()){
                        Yii::$app->getSession()->setFlash(
                            'success','Password changed'
                        );

                        // $modelTransaction = new Transaction();
                        // date_default_timezone_set('Asia/Manila');
                        // $modelTransaction->date_time = date('Y-m-d H:i:s');
                        // $modelTransaction->user = Yii::$app->user->identity->username;
                        // $modelTransaction->message = 'Change Password';
                        // $modelTransaction->save();

                        return $this->redirect(['index']);
                    }else{
                        Yii::$app->getSession()->setFlash(
                            'error','Password not changed'
                        );
                        return $this->redirect(['index']);
                    }
                }catch(Exception $e){
                    Yii::$app->getSession()->setFlash(
                        'error',"{$e->getMessage()}"
                    );
                    return $this->render('changepassword',[
                        'model'=>$model
                    ]);
                }
            }else{
                return $this->render('changepassword',[
                    'model'=>$model
                ]);
            }
        }else{
            return $this->render('changepassword',[
                'model'=>$model
            ]);
        }
    }

}
