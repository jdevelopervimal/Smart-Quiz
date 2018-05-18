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
use common\models\Quiz;
use common\models\Question;
use common\models\QuestionCategory;
use common\models\Result;
use common\models\Options;
use common\models\QuizGroup;
use common\models\Purchase;

/**
 * Site controller
 */
class QuizController extends Controller {

    public $enableCsrfValidation = false;

    public function beforeAction($action) {
        if (empty(Yii::$app->user->identity->id)) {
            $this->redirect(BASE_URL);
        } else {
            return TRUE;
        }
    }

    public function actionIndex() {
        $user_id = Yii::$app->user->identity->id;
        $group = User::find()->select('group_id')->where(['id' => $user_id])->asArray()->one();
        $quid_s = QuizGroup::find()->select('quid')->where(['gid' => $group['group_id']])->asArray()->all();
        $quids = array_column($quid_s, 'quid');
        if (empty($quids)) {
            $quids_im = '0';
        } else {
            $quids_im = implode(',', $quids);
        }
        $quizes = Quiz::find()->where('quid IN(' . $quids_im . ')')->all();

        return $this->render('index', ['quizes' => $quizes]);
    }

    public function actionAccess($id) {
        $user_id = Yii::$app->user->identity->id;
        $this->layout = 'quiz';

        return $this->render('access-quiz', [
                    'quid' => $id]);
    }

    public function actionQuizinfo() {
        $user_id = Yii::$app->user->identity->id;
        $quiz = array();
        $quid = Yii::$app->request->get('id');
        $quiz[] = $my_quiz = Quiz::find()->where(['quid' => $quid])->asArray()->one();
        $quiz['ques_count'] = 0;
        $access = 'yes';
        if (!empty($my_quiz['qids_static']) || ($my_quiz['duration'] > 0)) {
            $quid_data = unserialize($my_quiz['qids_static']);
            if ($quid_data['type'] == 'manual') {
                $quiz['category_name'] = $my_quiz['quiz_name'];
                $quiz['cat_duration'] = $my_quiz['duration'];
                $quiz['ques_count'] = Question::getQuestionCountByIds($quid_data['ques']);
            } else {
                $quiz['category'] = QuestionCategory::find()->select('cid,category_name,cat_duration')->where('cid IN(' . implode(',', $quid_data['category']) . ')')->asArray()->all();
                $quiz['ques_count'] = Question::getQuestionCountByCategory($quid_data['category']);
            }
        } else {
            $access = 'no';
        }
        $quiz[] = $results = Result::find()->select('rid,status,res_saved_data')->where(['uid' => $user_id])->andWhere(['quid' => $quid])->orderBy(['rid' => SORT_DESC])->limit(1)->asArray()->all();

        if ((($my_quiz['max_attempts'] > count($results)) || $results[0]['status'] == 0) && ($access == 'yes')) {
            if (empty($results) || $results[0]['status'] == 1) {
                $max_score = $quiz['ques_count'] * $my_quiz['correct_score'];
                Result::setResultEnvironment($user_id, $quid, $max_score);
            }
        } else {
            $quiz['category_name'] = '';
            $quiz['cat_duration'] = '0';
            $access = 'no';
        }
        
        if($my_quiz['test_type'] == 1){
            $trans = Purchase::find()->where(['transaction_status'=>'success'])->andWhere(['quiz_id'=>$quid])->one(); 
            if($trans){
                $access = 'yes';
                
            }else{
                $access = 'no';
            }
         }
        
        //echo '<pre>';
        //print_r($quiz['category']);die;
        return $this->render('quiz-info', ['access' => $access, 'quiz' => $quiz]);
    }

    public function actionGetquiz() {
        if (Yii::$app->request->post()) {
            $post = Yii::$app->request->post();
            $quiz = Quiz::find()->where(['quid' => $post['quiz-id']])->one();
            $quiz_data = array();
            if (!empty($quiz->qids_static)) {
                $quid_data = unserialize($quiz->qids_static);
                if ($quid_data['type'] == 'manual') {
                    $quiz_data[0]['category_name'] = $quiz->quiz_name;
                    $quiz_data[0]['cat_duration'] = $quiz->duration;
                    $quiz_data[0]['questions'] = Question::getAllQuestions('qids', $quid_data['ques']);
                } else {
                    $quiz_data = QuestionCategory::find()->select('cid,category_name,cat_duration')->where('cid IN(' . implode(',', $quid_data['category']) . ')')->asArray()->all();
                    foreach ($quiz_data as $key => $category) {
                        $quiz_data[$key]['questions'] = Question::getAllQuestions('cat', $category['cid']);
                    }
                }
                $arr = array();
                $user_id = Yii::$app->user->identity->id;
                $result = Result::find()->where(['uid' => $user_id])->andWhere(['quid' => $post['quiz-id']])->orderBy(['rid' => SORT_DESC])->asArray()->one();
                $arr['current'] = explode(',', $result['res_saved_data']);
                $arr['attempts_oids'] = explode(',', $result['oids']);
                $arr['attempts_qids'] = $result['qids'];
                $arr['quiz_duration'] = $quiz->duration;
                $arr['quiz_name'] = $quiz->quiz_name;
                $quiz_data[0]['ansdata'] = $arr;
                return json_encode($quiz_data);
                //return	json_encode($result);
            } else {
                return json_encode('Empty Quiz');
            }
        } else {
            return json_encode('Invalid Request');
        }
    }

    public function actionResults() {
        $data = array();
        $user_id = Yii::$app->user->identity->id;
        $post = Yii::$app->request->post();
        $data['quiz'] = $quiz = Quiz::find()->where(['quid' => $post['quiz-id']])->one();
        $result = Result::find()->where(['uid' => $user_id])->andWhere(['quid' => $post['quiz-id']])->andWhere(['status' => 0])->orderBy(['rid' => SORT_DESC])->one();
        if (!empty($result)) {
            $qids = explode(',', $result->qids);
            $oids = explode(',', $result->oids);
            $score = array();
            $incurrect_ques = 0;
            foreach ($qids as $key => $val) {
                $q_type = Question::find()->select('q_type')->where(['qid' => $val])->asArray()->one();
                $max_marks = $quiz->correct_score;
                $r_option = Options::find()->select('oid,score')->where(['qid' => $val])->andWhere(['score' => 1])->asArray()->all();

                if ($q_type['q_type'] != 4) {
                    if ($q_type['q_type'] == 1) {
                        if (isset($r_option[0]['oid'])) {
                            if ($r_option[0]['oid'] == $oids[$key]) {
                                $score[] = $max_marks;
                            } else {
                                $score[] = 0;
                                $incurrect_ques++;
                            }
                        } else {
                            $score[] = 0;
                            $incurrect_ques++;
                        }
                    } else {
                        $oids2 = explode('$', $oids[$key]);
                        $r_opt = array_column($r_option, 'oid');
                        foreach ($oids2 as $op) {
                            $ans[] = substr($op, 0, -2);
                        }
                        if (count($r_opt) == count($oids2)) {
                            $arr = array_diff($r_opt, $ans);
                            if (count($arr) == 0) {
                                $score[] = $max_marks;
                            } else {
                                $score[] = 0;
                                $incurrect_ques++;
                            }
                        } else {
                            $score[] = 0;
                        }
                    }
                } else {
                    $score[] = 0;
                }
            }
            $sum_score = array_sum($score);
            if ($result->essay_ques != 1) {
                $data['incorrect_score'] = $neg_score = $incurrect_ques * $quiz->incorrect_score;
                $sum_score = $sum_score - $neg_score;
                $result->percentage = round((($sum_score / $result->max_score) * 100), 2);
                $data['pass'] = ($result->percentage >= $quiz->pass_percentage) ? 'Pass' : 'Fail';
            }
            $result->score = $sum_score;
            $result->score_ind = implode(',', $score);
            $result->status = 1;

            $result->save();
            $data['score'] = $sum_score;
            $data['result'] = $result;
        } else {
            $data['msg'] = 'Invalid Request';
        }
        return $this->render('results', ['data' => $data]);
    }

    public function actionSaveques() {
        $oidsa = array();
        $qidsa = array();
        $iskeyfound = false;
        $user_id = Yii::$app->user->identity->id;
        if (Yii::$app->request->post()) {
            $post = Yii::$app->request->post();
            $cur_arr = [0 => $post['cur_cat'], 1 => $post['cur_ques']];

            if (!empty($post['qid']) && (!empty($post['optid']) || !empty($post['assay-ans']))) {

                /*  Current result which status has been 1 */
                $result = Result::find()->where(['uid' => $user_id])->andWhere(['quid' => $post['quid']])->orderBy(['rid' => SORT_DESC])->one();

                if (!empty($result->qids)) {
                    $qid_resu_arr = explode(",", $result->qids);
                    $oidsa = explode(',', $result->oids);
                    //$score = explode(',',	$result->score_ind);
                    $iskeyfound = array_search($post['qid'], $qid_resu_arr);
                }

                switch ($post['q_type']) {
                    case 1 :
                        if ($iskeyfound !== false) {
                            $oidsa[$iskeyfound] = $post['optid'];
                        } else {
                            $qid_resu_arr[] = $post['qid'];
                            $oidsa[] = $post['optid'];
                        }
                        break;
                    case 2 :
                        if ($iskeyfound !== false) {
                            $oidsa[$iskeyfound] = implode('$', $post['optid']);
                        } else {
                            $qid_resu_arr[] = $post['qid'];
                            $oidsa[] = implode('$', $post['optid']);
                        }
                        break;
                    default:
                        if ($iskeyfound !== false) {
                            $eid = $oidsa[$iskeyfound];
                            $essay = \common\models\Essay::find()->where(['essay_id' => $eid])->one();
                            $essay->essay_cont = $post['assay-ans'];
                            $essay->save();
                        } else {
                            $essay = new \common\models\Essay();
                            $essay->q_id = $post['qid'];
                            $essay->q_type = $post['q_type'];
                            $essay->r_id = $result->rid;
                            $essay->essay_cont = $post['assay-ans'];
                            $essay->essay_score = 0;
                            $essay->essay_status = 1;
                            if ($essay->validate()) {
                                $essay->save();
                                $eid = Yii::$app->db->getLastInsertID();
                                $qid_resu_arr[] = $post['qid'];
                                $oidsa[] = $eid;
                            }
                        }
                }
                $result->qids = implode(',', $qid_resu_arr);
                $result->oids = implode(',', $oidsa);
                $result->res_saved_data = implode(',', $cur_arr);
                $result->last_response = Yii::$app->formatter->asTimestamp(date('Y-d-m h:i:s'));
                if ($result->validate()) {
                    $result->save();
                    return json_encode('saved');
                }
            } else {
                return json_encode('No Option Selected');
            }
        } else {
            return json_encode('Invalid Request');
        }
    }

    public function actionTest() {
        $quiz_data['uid'] = $user_id = Yii::$app->user->identity->id;
        $data['quiz'] = $quiz = Quiz::find()->where(['quid' => 1])->one();
        $result = Result::find()->where(['uid' => $user_id])->andWhere(['quid' => 1])->andWhere(['status' => 0])->orderBy(['rid' => SORT_DESC])->one();
        if (!empty($result)) {
            $quiz_data['qids'] = $qids = explode(',', $result->qids);
            $oids = explode(',', $result->oids);
            $score = array();
            foreach ($qids as $key => $val) {
                $q_type = Question::find()->select('q_type')->where(['qid' => $val])->asArray()->one();
                $max_marks = $quiz->correct_score;
                $quiz_data['oids'] = $r_option = Options::find()->select('oid,score')->where(['qid' => $val])->andWhere(['score' => 1])->asArray()->all();

                if ($q_type['q_type'] != 4) {
                    if ($q_type['q_type'] == 1) {
                        if ($r_option[0]['oid'] == $oids[$key]) {
                            $score[] = $max_marks;
                        } else {
                            $score[] = 0;
                        }
                    } else {
                        $oids2 = explode('-', $oids[$key]);
                        $r_opt = array_column($r_option, 'oid');
                        if (count($r_opt) == count($oids2)) {
                            $arr = array_diff($r_opt, $oids2);
                            if (count($arr) == 0) {
                                $score[] = $max_marks;
                            } else {
                                $score[] = 0;
                            }
                        } else {
                            $score[] = 0;
                        }
                    }
                } else {
                    $score[] = 0;
                }
            }
            $sum_score = array_sum($score);
            $quiz_data['score'] = $result->score_ind = implode(',', $score);
            $quiz_data['percentage'] = $result->percentage = round((($sum_score / $result->max_score) * 100), 2);
            //$result->save();
            $data['score'] = $sum_score;
            $data['result'] = $result;
        } else {
            $quiz_data['msg'] = $data['msg'] = 'Invalid Request';
        }
        //$quiz_data['results'] = $result;
        return $this->render('test', [
                    'question' => $quiz_data
        ]);
    }

}
