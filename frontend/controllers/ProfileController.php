<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProfileController
 *
 * @author Vimal
 */

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\User;
use common\models\Result;
use common\models\Quiz;
use common\models\QuestionCategory;
use common\models\Question;
use common\models\QuizGroup;
use common\models\Uploads;

/**
 * Site controller
 */
class ProfileController extends Controller {

    public $enableCsrfValidation = false;

    public function beforeAction($action) {
        if (empty(Yii::$app->user->identity->id)) {
            $this->redirect(BASE_URL);
        } else {
            return TRUE;
        }
    }

    public function actionIndex() {
        $this->layout = 'main';
        $user = User::find()->where(['id' => Yii::$app->user->identity->id])->all();
        $user_id = Yii::$app->user->identity->id;
        $group = User::find()->select('group_id')->where(['id' => $user_id])->asArray()->one();
        $quid_s = QuizGroup::find()->select('quid')->where(['gid' => $group['group_id']])->asArray()->all();
        $quids = array_column($quid_s, 'quid');
        $chart_data = Result::getChartData($user_id);
        if (empty($quids)) {
            $quids_im = '0';
        } else {
            $quids_im = implode(',', $quids);
        }
        $quizes = Quiz::find()->where('quid IN(' . $quids_im . ')')->orderBy('quid DESC')->limit(3)->all();
        return $this->render('index', ['user' => $user, 'quizes' => $quizes, 'chart_data' => $chart_data]);
    }

    public function actionCheckusername() {
        if (Yii::$app->request->post()) {
            $post = Yii::$app->request->post();
            $user = User::find()->where(['username' => $post['username']])->all();
            if (empty($user)) {
                return json_encode([ "valid" => true]);
            } else {
                return json_encode([ "valid" => false]);
            }
        } else {
            return json_encode([ "valid" => false]);
        }
    }

    public function actionAssignments() {
        $session = new \yii\web\Session();
        $session->open();
        $files = Uploads::getAllFiles(1, $group = $session->get('group_id'));
        return $this->render('assignments', ['files' => $files]);
    }

    public function actionVideoclass() {
        $session = new \yii\web\Session();
        $session->open();
        $files = Uploads::getAllFiles(2, $group = $session->get('group_id'));
        return $this->render('video-class', ['files' => $files]);
    }

    public function actionStudymaterial() {
        $session = new \yii\web\Session();
        $session->open();
        $files = Uploads::getAllFiles(3, $group = $session->get('group_id'));
        return $this->render('study-material', ['files' => $files]);
    }

    public function actionSettings() {
        if (Yii::$app->request->post()) {
            $user = User::find()->where(['id' => Yii::$app->user->identity->id])->one();
            $post = Yii::$app->request->post();
            switch ($post['request']) {
                case "step-1":
                    $profile = '';
                    if (isset($_FILES["file_0"]["type"])) {
                        $validextensions = array("jpeg", "jpg", "png");
                        $temporary = explode(".", $_FILES["file_0"]["name"]);
                        $file_extension = end($temporary);
                        if ((($_FILES["file_0"]["type"] == "image/png") || ($_FILES["file_0"]["type"] == "image/jpg") || ($_FILES["file_0"]["type"] == "image/jpeg") ) && ($_FILES["file_0"]["size"] < 500000) && in_array($file_extension, $validextensions)) {
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
                    $user->profile_pic = (empty($profile)) ? $post['old_pic'] : $profile;
                    $user->first_name = $post['first_name'];
                    $user->last_name = $post['last_name'];
                    $user->fathers_name = $post['fathers_name'];
                    $user->gender = $post['q1'];
                    $session = new \yii\web\Session();
                    $session->open();
                    $session->set('profile_pic', $user->profile_pic);
                    break;
                case "step-2":
                    if (Yii::$app->security->validatePassword($post['old_password'], $user->password_hash)) {
                        $user->setPassword($post['password']);
                        $user->generateAuthKey();
                    } else {
                        return 'Invalid Password';
                    }

                    break;
            }
            if ($user->validate()) {
                $user->save();
                return true;
            } else {
                return false;
            }
        } else {
            $user = User::find()->where(['id' => Yii::$app->user->identity->id])->asArray()->one();
            return $this->render('settings', ['user' => $user]);
        }
    }

    public function actionInbox() {
        return $this->render('inbox');
    }

    public function actionResults() {
        $user_id = Yii::$app->user->identity->id;
        $result = new Result();
        $result = $result->getUserResult($user_id);
        return $this->render('results', ['results' => $result]);
    }

    public function actionSummery($id) {
        $user_id = Yii::$app->user->identity->id;
        $result = Result::find()->where(['rid' => $id])->andWhere(['uid' => $user_id])->asArray()->one();
        $quiz = Quiz::find()->where(['quid' => $result['quid']])->one();
        $data = array();
        $quiz_data = array();
        if (!empty($quiz->qids_static)) {
            $quid_data = unserialize($quiz->qids_static);
            if ($quid_data['type'] == 'manual') {
                $quiz_data[0]['category_name'] = $quiz->quiz_name;
                $quiz_data[0]['cat_duration'] = $quiz->duration;
                $quiz_data[0]['questions'] = Question::getAllQuestionsSummery('qids', $quid_data['ques']);
            } else {
                $quiz_data = QuestionCategory::find()->select('cid,category_name,cat_duration')->where('cid IN(' . implode(',', $quid_data['category']) . ')')->asArray()->all();
                foreach ($quiz_data as $key => $category) {
                    $quiz_data[$key]['questions'] = Question::getAllQuestionsSummery('cat', $category['cid']);
                }
            }
            $data['result'] = $result;
            $data['questions'] = $quiz_data;
            return $this->render('results-summery', ['data' => $data]);
        }
    }

}
