<?php

namespace backend\controllers;

use common\models\FileCategory;
use common\models\Uploads;
use Yii;
use yii\web\Controller;

class UploadController extends Controller {

    public function actionIndex() {
        $data['fileCategory'] = FileCategory::find()->all();
        $data['files'] = Uploads::find()->all();
        $data['group'] = \common\models\UserGroup::find()->select('gid,group_name')->all();
        return $this->render('index', ['data' => $data]);
    }

    function actionCreate() {
        if (Yii::$app->request->post()) {
            $post = Yii::$app->request->post();
            switch ($post['request']) {
                case "update-category":
                    $cat = new FileCategory();
                    if ($post['id'] > 0) {
                        $cat = FileCategory::find()->where(['id' => $post['id']])->one();
                    }
                    $cat->name = $post['category_name'];
                    if ($cat->validate()) {
                        $cat->save();
                        return true;
                    } else {
                        return false;
                    }
                    break;
                case "update-file":
                    $fname = '';
                    //print_r($_FILES);die;
                    //echo Yii::getAlias('@basepath');die;
                    if (!empty($_FILES) && $_FILES['file_name']['error'] == 0) {
                        if (is_uploaded_file($_FILES['file_name']['tmp_name'])) {
                            $sourcePath = $_FILES['file_name']['tmp_name'];
                            $targetPath = Yii::getAlias('@basepath') . "/uploads/files/" . $_FILES['file_name']['name'];
                            if (move_uploaded_file($sourcePath, $targetPath)) {
                                $fname = $_FILES['file_name']['name'];
                            }
                        }
                    } else {
                        return 'Selected Files not Valid.';
                    }
                    $upload = new Uploads();
                    $upload->subject_id = $post['subject_id'];
                    $upload->group_ids = implode(',', $post['group']);
                    $upload->topic_name = $post['topic_name'];
                    $upload->file_category = $post['file_type'];
                    $upload->file_path = $fname;
                    if ($upload->validate()) {
                        $upload->save();
                        return true;
                    } else {
                        return false;
                    }
                    break;
                case "step-3":
                    $cat = FileCategory::findOne($post['cat_id']);
                    if ($cat->delete()) {
                        return true;
                    }
                    break;
                case "step-4":
                    $file = $post['file_name'];
                    $fdel = Yii::getAlias('@basepath') . "/uploads/files/" . $file;
                    $upload = Uploads::findOne($post['fid']);
                    //return $fdel;die; 
                    if (unlink($fdel)) {
                        $upload->delete();
                        return true;
                    }
                    break;
            }
        } else {
            return json_encode('Invalid request.');
        }
    }

}
