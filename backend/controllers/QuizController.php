<?php

namespace backend\controllers;

use Yii;
use common\models\Quiz;
use backend\models\QuizSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use common\models\Question;
use common\models\QuestionCategory;
use common\models\UserGroup;
use common\models\QuizGroup;
use common\models\Result;
use common\models\Essay;

/**
 * QuizController implements the CRUD actions for Quiz model.
 */
class QuizController extends Controller {

    public $enableCsrfValidation = false;

    /**
     * @inheritdoc
     */
    public function beforeAction($action) {
        if (empty(Yii::$app->user->identity->id)) {
            $this->redirect(BASE_URL);
        } else {
            return TRUE;
        }
    }

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Quiz models.
     * @return mixed
     */
    public function actionIndex($msg = '') {
        $searchModel = new QuizSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $data = Quiz::find()->all();
        return $this->render('index', [
                    'data' => $data,
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'msg' => $msg,
        ]);
    }

    /**
     * Displays a single Quiz model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $request = Yii::$app->request;
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => "Quiz #" . $id,
                'content' => $this->renderAjax('view', [
                    'model' => $this->findModel($id),
                ]),
                'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                Html::a('Edit', ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
            ];
        } else {
            return $this->render('view', [
                        'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new Quiz model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $data = array();
        $quiz = new Quiz();
        $groups = UserGroup::find()->all();
        $data['categories'] = QuestionCategory::find()->all();
        $question = new Question();
        $data['questions'] = $question->getAllQuestion();
        $data['group'] = $groups;

        if (Yii::$app->request->get()) {
            $get = Yii::$app->request->get();
            $quiz = Quiz::find()->where(['quid' => $get['id']])->one();
            $data_t = QuizGroup::getAllgroup($quiz->quid);
            foreach ($data_t as $gr) {
                $data['quiz-group'][] = $gr['gid'];
            }
        }
        if (Yii::$app->request->post()) {
            $post = Yii::$app->request->post();
            if (isset($post['quid'])) {
                $quiz = Quiz::find()->where(['quid' => $post['quid']])->one();
            }
            
            $quiz->quiz_name = $post['quiz_name'];
            $quiz->description = $post['description'];
            $quiz->quiz_code = $post['quiz_code'];
            $quiz->start_time = $post['start_time'];
            $quiz->end_time = $post['end_time'];
            $quiz->pass_percentage = $post['pass_percentage'];
            $quiz->pract_test = $post['pract_test'];
            $quiz->test_type = $post['q_type'];
            if($quiz->test_type == 1){
                $quiz->quiz_price = $post['quiz_price'];
            }else{
                $quiz->quiz_price = 0;
            }
            $quiz->view_answer = $post['view_answer'];
            $quiz->max_attempts = $post['max_attempts'];
            $quiz->correct_score = $post['correct_score'];
            $quiz->incorrect_score = $post['incorrect_score'];
            if ($quiz->validate()) {
                $quiz->save();
                $unew = Yii::$app->db->getLastInsertID();
                $quid = empty($unew) ? $quiz->quid : $unew;
                $data_t = QuizGroup::getAllgroup($quid);
                $data_g = array();
                foreach ($data_t as $gr) {
                    $data_g[] = $gr['gid'];
                }
                $insert = array_diff($post['group'], $data_g);
                $del = array_diff($data_g, $post['group']);

                foreach ($insert as $key => $val) {
                    $qg = new QuizGroup();
                    $qg->quid = $quid;
                    $qg->gid = $val;

                    if ($qg->validate()) {
                        $qg->save();
                    }
                }
                foreach ($del as $key => $val) {
                    QuizGroup::deleteAllMatches($quid, $val);
                }
                $msg = 'Quiz Successfully saved';
            } else {
                $msg = 'Internal error please try again.';
            }
            $this->redirect(['index', 'msg' => $msg]);
        }
        return $this->render('create', [
                    'quiz' => $quiz,
                    'data' => $data,
        ]);
    }

    public function actionSummery($id) {
        $result = Result::find()->where(['rid' => $id])->asArray()->one();
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

    public function actionAddques() {
        if (Yii::$app->request->post()) {
            $post = Yii::$app->request->post();
            $quiz = Quiz::find()->where(['quid' => $post['quid']])->one();
            $quid_data = array();
            if ($quiz->qids_static != NULL) {
                $quid_data = unserialize($quiz->qids_static);
                if (isset($quid_data['type']) && $quid_data['type'] == 'manual') {
                    $quid_data['ques'][] = $post['qid'];
                } else {
                    $quid_data['category'][] = $post['cat_id'];
                }
            } else {
                if (isset($post['qid'])) {
                    if ($quiz->duration <= 0) {
                        return json_encode('Please update quiz duration first');
                    }
                    $quid_data['type'] = 'manual';
                    $quid_data['category'] = 'Uncategorised';
                    $quid_data['ques'][] = $post['qid'];
                } else {
                    $quid_data['type'] = 'auto';
                    $quid_data['category'][] = $post['cat_id'];
                }
            }
            $quiz->qids_static = serialize($quid_data);

            if ($quiz->validate()) {
                $quiz->update();
                return 1;
            }
            return json_encode('Internal error please try again');
        }
        return json_encode('Different method not allowed');
    }

    public function actionRemoveques() {
        if (Yii::$app->request->post()) {
            $post = Yii::$app->request->post();
            $quiz = Quiz::find()->where(['quid' => $post['quid']])->one();
            $quid_data = array();
            if ($quiz->qids_static != NULL) {
                $quid_data = unserialize($quiz->qids_static);
                if ($quid_data['type'] == 'manual') {
                    $quid_data['ques'] = array_diff($quid_data['ques'], array($post['qid']));
                } else {
                    $quid_data['category'] = array_diff($quid_data['category'], array($post['cat_id']));
                }
            } else {
                
            }
            $quiz->qids_static = serialize($quid_data);

            if ($quiz->validate()) {
                $quiz->update();
                return 1;
            }
            return json_encode('Internal error please try again');
        }
        return json_encode('Different method not allowed');
    }

    public function actionUpdateduration() {
        if (Yii::$app->request->post()) {
            $post = Yii::$app->request->post();
            $quiz = Quiz::find()->where(['quid' => $post['quid']])->one();
            $quiz->duration = $post['cat_duration'];
            if ($quiz->validate()) {
                $quiz->update();
                return 1;
            }
            return 0;
        }
    }

    /**
     * Delete an existing Quiz model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionEvaluate($id) {
        $data = array();
        $result = Result::find()->select('qids,oids')->where(['rid' => $id])->asArray()->one();
        $qids = explode(',', $result['qids']);
        $oids = explode(',', $result['oids']);
        $questions = Question::find()->where('qid IN (' . $result['qids'] . ')')->andWhere(['q_type' => 4])->asArray()->all();
        foreach ($questions as $key => $question) {
            $questions[$key]['essay'] = Essay::find()->where(['q_id' => $question['qid']])->asArray()->one();
        }
        $data = $questions;
        return $this->render('evaluate', ['results' => $data]);
    }

    public function actionSaveevaluation() {
        if (Yii::$app->request->post()) {
            return 'Saved';
        } else {
            return 'Invalid Request';
        }
    }

    public function actionDelete($id) {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

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
     * Delete multiple existing Quiz model.
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
     * Finds the Quiz model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Quiz the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Quiz::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
