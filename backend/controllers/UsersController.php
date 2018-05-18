<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsersController
 *
 * @author Vimal Kumar
 */

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\User;
use common\models\UserGroup;
use \common\models\Result;

class UsersController extends Controller {

    public $enableCsrfValidation = false;

    public function beforeAction($action) {
        if (empty(Yii::$app->user->identity->id)) {
            $this->redirect(BASE_URL);
        } else {
            return TRUE;
        }
    }

    public function actionIndex($msg = '') {
        $user = new User();
        $users = $user->getAllUser();
        //$users = User::find()->all();
        echo $this->render('index', ['users' => $users, 'msg' => $msg]);
    }

    public function actionCreate() {
        $user = new User();
        $group = UserGroup::find()->all();
        if (Yii::$app->request->get()) {
            $get = Yii::$app->request->get();
            $user = User::find()->where(['id' => $get['id']])->one();
        }
        if (Yii::$app->request->post()) {

            $message = '';
            $post = Yii::$app->request->post();
            if ($user->id) {
                $user = User::find()->where(['id' => $user->id])->one();
            }
            $user->first_name = $post['first_name'];
            $user->last_name = $post['last_name'];
            $user->status = $post['status'];
            $user->membership = $post['membership'];
            $user->role_id = $post['role_id'];
            $user->email = isset($post['email']) ? $post['email'] : $user->email;
            $user->group_id = $post['group_id'];
            $user->setPassword($post['password']);
            $user->generateAuthKey();
            $user->created_at = new \yii\db\Expression('now()');
            if ($user->validate()) {
                $user->save();
                $message = 'User successfully created';
            } else {
                $message = 'Modal Validation Error';
            }
            $this->redirect(['index', 'msg' => $message]);
        } else {
            return $this->render('create', ['user' => $user, 'group' => $group]);
        }
    }

    public function actionCheckusername() {
        if (Yii::$app->request->post()) {
            $post = Yii::$app->request->post();
            $user = User::find()->where(['email' => $post['email']])->all();
            if (empty($user)) {
                return json_encode([ "valid" => true]);
            } else {
                return json_encode([ "valid" => false]);
            }
        } else {
            return json_encode([ "valid" => false]);
        }
    }

    public function actionResults() {
        $user_id = Yii::$app->user->identity->id;
        $results = Result::getAllResult($user_id);
        return $this->render('results', [
                    'results' => $results,
        ]);
    }

    public function actionDelete($id) {
        $admin = Yii::$app->user->identity->id;
        if (($admin == 1) && ($id != $admin)) {
            $user = User::find()->where(['id' => $id])->one();
            if ($user) {
                $user->trash = 1;
                $user->updated_at = new \yii\db\Expression('now()');
                //$user->created_at	=	new	\yii\db\Expression('now()');
                $user->save();
                $message = 'User successfully deleted';
            }
        } else {
            $message = "You can't delete Admin user";
        }
        $this->redirect(['index', 'msg' => $message]);
    }

}
