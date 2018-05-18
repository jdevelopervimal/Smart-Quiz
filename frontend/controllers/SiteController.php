<?php

namespace frontend\controllers;

use Yii;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\User;
use common\models\UserGroup;

/**
 * Site controller
 */
class SiteController extends Controller {

    public $enableCsrfValidation = false;

    /**
     * @inheritdoc
     */
    public function behaviors() {

        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
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
    public function actions() {
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
     * @return mixed
     */
    public function actionIndex($msg = '') {
        $this->layout = 'login';
        $group = UserGroup::find()->all();
        if (!empty(Yii::$app->user->identity->id) && (Yii::$app->user->identity->id != 0)) {
            //echo Yii::$app->user->identity->id;die;
            $user = User::find()
                    ->where(['id' => Yii::$app->user->identity->id])
                    ->one();
            //echo '<pre>';
            //print_r($user);die;
            if ($user->profile_status == 'pending') {
                return $this->render('profile_builder', ['user' => $user]);
            } else {
                return $this->render('index', ['msg' => $msg]);
            }
        } else {
            return $this->render('index', ['msg' => $msg]);
        }
    }

    public function actionCompleteprofile() {
        if (Yii::$app->request->post()) {
            $userid = Yii::$app->user->identity->id;
            $user = User::find()->where(['id' => $userid])->one();
            $post = Yii::$app->request->post();
            switch ($post['request']) {
                case "step-1":
                    $user->username = $post['username'];
                    $user->setPassword($post['password']);
                    $user->generateAuthKey();
                    break;
                case "step-2":
                    $profile = '';
                    //print_r($_FILES);
                    if (isset($_FILES["file_0"]["type"])) {
                        $validextensions = array("jpeg", "jpg", "png");
                        $temporary = explode(".", $_FILES["file_0"]["name"]);
                        $file_extension = end($temporary);
                        if ((($_FILES["file_0"]["type"] == "image/png") || ($_FILES["file_0"]["type"] == "image/jpg") || ($_FILES["file_0"]["type"] == "image/jpeg") ) && ($_FILES["file_0"]["size"] < 100000) && in_array($file_extension, $validextensions)) {
                            if ($_FILES["file_0"]["error"] > 0) {
                                //echo	"Return Code: "	.	$_FILES["file_0"]["error"]	.	"<br/><br/>";
                            } else {
                                if (file_exists(Yii::getAlias('@basepath') . '/uploads/profile-img/' . $_FILES["file_0"]["name"])) {
                                    $profile = $_FILES['file_0']['name'];
                                } else {
                                    $sourcePath = $_FILES['file_0']['tmp_name']; // Storing source path of the file in a variable
                                    $targetPath = Yii::getAlias('@basepath') . '/uploads/profile-img/' . $_FILES['file_0']['name']; // Target path where file is to be stored
                                    $profile = $_FILES['file_0']['name'];
                                    move_uploaded_file($sourcePath, $targetPath); // Moving Uploaded file
                                }
                            }
                        }
                    }
                    $user->profile_pic = (empty($profile)) ? '' : $profile;
                    $user->first_name = $post['first_name'];
                    $user->last_name = $post['last_name'];
                    $user->fathers_name = $post['father_name'];
                    $user->gender = $post['q1'];
                    $user->referrer = $post['referrer'];
                    $session = new \yii\web\Session();
                    $session->open();
                    $session->set('profile_pic', $profile);
                    break;
                case "step-3":
                    $user->json_data = serialize($post);
                    break;
                case "step-4":
                    $user->profile_status = 'complete';
                    break;
            }
            if ($user->validate()) {
                $user->save();
                return true;
            } else {
                return false;
            }
        }
    }
    public function actionRegister(){
        
        if (Yii::$app->request->post()) {
            $post = Yii::$app->request->post();
            
        }
    }
    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin($msg = '') {
        $this->layout = 'login';
        $user = new User();
        $message = '';
        if (!empty(Yii::$app->user->identity->id) && (Yii::$app->user->identity->id != 0)) {
            $this->redirect('quiz');
        }
        if (Yii::$app->request->post()) {
            $post = Yii::$app->request->post();

            $user_data = $user->getUserData($post['user_email']);

            $user = isset($user_data[0]) ? $user_data[0] : 0;

            if (!empty($user) && !empty($post['password'])) {
                if (Yii::$app->security->validatePassword($post['password'], $user['password_hash'])) {
                    $logins = User::findIdentity($user['id']);
                    Yii::$app->user->login($logins, SESSION_TIME);
                    $session = new \yii\web\Session();
                    $session->open();
                    $session->set('name', $user['first_name']);
                    $session->set('profile_pic', $user['profile_pic']);
                    $session->set('email', $user['email']);
                    $session->set('group', $user['group_name']);
                    $session->set('group_id', $user['group_id']);
                    //return	$this->redirect('quiz');
                    if ($user['profile_status'] == 'pending') {
                        return $this->render('profile_builder', ['user' => $user]);
                    } else {
                        return $this->redirect('profile');
                        //return	$this->render('profile',	['user'	=>	$user]);
                    }
                } else {
                    $msg = 'Username or Password my be incorrect.';
                }
            } else {
                $msg = 'Username or Password my be incorrect.';
            }
        }

        return $this->redirect(['index', 'msg' => $msg]);
        //return	$this->render('index',	['message'	=>	$message]);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact() {
        $this->layout = 'page';
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            //if	($model->sendEmail(Yii::$app->params['adminEmail']))	{
            if ($model->sendEmail('jdeveloper.vimal@gmail.com')) {
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
    public function actionAbout() {
        $this->layout = 'page';
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup() {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
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
    public function actionRequestPasswordReset() {
        $this->layout = 'login';
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
    public function actionResetPassword($token) {
        $this->layout = 'login';
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

}
