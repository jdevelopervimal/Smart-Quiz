<?php

namespace backend\controllers;

use Yii;
use common\models\Question;
use backend\models\QuestionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use common\models\QuestionCategory;
use common\models\DifficultLevel;
use common\models\Options;

/**
 * QuestionController implements the CRUD actions for Question model.
 */
class QuestionController extends Controller {

    public $enableCsrfValidation = false;

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['get'],
                    'bulk-delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Question models.
     * @return mixed
     */
    public function actionIndex($msg = '') {
        $question = new Question();
        //$data = Question::find()->all();		
        $data = $question->getAllQuestion();
        return $this->render('index', [
                    'questions' => $data,
                    'msg' => $msg,
        ]);
    }

    /**
     * Creates a new Question model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($msg = '') {
        $question = new Question();
        $optionsAll = new Options();
        $category = QuestionCategory::find()->all();
        $difficulty = DifficultLevel::find()->all();
        $parent = array('p_id' => 0, 'p_cat' => 0);
        $data = array();
        if (Yii::$app->request->get()) {
            $get = Yii::$app->request->get();
            if (isset($get['id'])) {
                $question = Question::find()->where(['qid' => $get['id']])->one();
                $optionsAll = Options::find()->where(['qid' => $get['id']])->all();
                if ($question->q_type == 3) {
                    $getAllChild = Question::find()->where(['parent_qid' => $question->qid])->all();
                    $data['child'] = $getAllChild;
                }
            }
            if (isset($get['parent'])) {
                $par_cat = Question::find()->where(['qid' => $get['parent']])->one();
                $parent = array('p_id' => $get['parent'], 'p_cat' => $par_cat->cid);
            }
        }

        if (Yii::$app->request->post()) {
            $post = Yii::$app->request->post();
            if ($post['qid'] > 0) {
                $question = Question::find()->where(['qid' => $post['qid']])->one();
            }
            $question->question = $post['question'];
            $question->description = $post['descrition'];
            $question->parent_qid = isset($post['parent']) ? $post['parent'] : 0;
            $question->cid = $post['question_category'];
            $question->did = $post['did'];
            $question->q_type = isset($post['question_type']) ? $post['question_type'] : $question->q_type;
            if ($question->validate()) {
                $question->save();
                $qid = Yii::$app->db->getLastInsertID();

                if ($question->q_type < 3) {
                    foreach ($post['option_value'] as $key => $val) {
                        $opt = new Options();
                        if (isset($post['oid']) && count($post['oid']) > 0) {
                            $opt = Options::find()->where(['oid' => $post['oid'][$key]])->one();
                        } else {
                            $opt->qid = $qid;
                        }

                        $opt->option_value = $val;
                        if (is_array($post['option'])) {
                            if (in_array(($key + 1), $post['option'])) {
                                $opt->score = 1;
                            }
                        } else {
                            $opt->score = (($key + 1) == $post['option']) ? 1 : 0;
                        }
                        if ($opt->validate()) {
                            $opt->save();
                            $msg = 'Question successfully saved';
                        }
                    }
                }

                $optionsAll = Options::find()->where(['qid' => $post['qid']])->all();
            } else {
                $msg = 'Error in question saving please try again';
            }
            if ($question->parent_qid > 0) {
                $this->redirect(['create', 'id' => $question->parent_qid, 'msg' => $msg]);
            } else {
                $this->redirect(['index', 'msg' => $msg]);
            }
        }
        return $this->render('create', [
                    'category' => $category,
                    'difficulty' => $difficulty,
                    'parent' => $parent,
                    'question' => $question,
                    'options' => $optionsAll,
                    'data' => $data,
                    'msg' => $msg,
        ]);
    }

    /**
     * Delete an existing Question model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id = '') {
        //$option = new Option();
        $this->findModel($id)->delete();
        Options::deleteAll(['qid' => $id]);
        return $this->redirect(['index']);
    }

    /**
     * Delete multiple existing Question model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBulkDelete() {
        $request = Yii::$app->request;
        $pks = explode(',', $request->post('pks')); // Array or selected records primary keys
        foreach ($pks as $pk) {
            $model = $this->findModel($pk);
            $model->delete();
        }

        if ($request->isAjax) {
            /*
             *   Process for ajax request
             */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose' => true, 'forceReload' => '#crud-datatable-pjax'];
        } else {
            /*
             *   Process for non-ajax request
             */
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the Question model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Question the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Question::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
