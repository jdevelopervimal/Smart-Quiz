<?php

namespace common\models;

use Yii;
use common\models\QuestionCategory;

/**
 * This is the model class for table "quiz".
 *
 * @property integer $quid
 * @property string $quiz_name
 * @property string $description
 * @property integer $start_time
 * @property integer $end_time
 * @property integer $duration
 * @property string $pass_percentage
 * @property integer $test_type
 * @property string $credit
 * @property integer $view_answer
 * @property integer $max_attempts
 * @property string $correct_score
 * @property string $incorrect_score
 * @property integer $institute_id
 * @property string $qids_static
 * @property integer $qselect
 * @property string $ip_address
 * @property integer $camera_req
 * @property integer $pract_test
 */
class Quiz extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'quiz';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'quid' => Yii::t('app', 'Quid'),
            'quiz_name' => Yii::t('app', 'Quiz Name'),
            'description' => Yii::t('app', 'Description'),
            'quiz_code' => Yii::t('app', 'Quiz Code'),
            'start_time' => Yii::t('app', 'Start Time'),
            'end_time' => Yii::t('app', 'End Time'),
            'duration' => Yii::t('app', 'Duration'),
            'pass_percentage' => Yii::t('app', 'Pass Percentage'),
            'test_type' => Yii::t('app', '0=> Free,1=> Paid'),
            'credit' => Yii::t('app', 'Credit'),
            'view_answer' => Yii::t('app', 'View Answer'),
            'max_attempts' => Yii::t('app', 'Max Attempts'),
            'correct_score' => Yii::t('app', 'Correct Score'),
            'incorrect_score' => Yii::t('app', 'Incorrect Score'),
            'institute_id' => Yii::t('app', 'Institute ID'),
            'qids_static' => Yii::t('app', 'Qids Static'),
            'qselect' => Yii::t('app', 'Qselect'),
            'ip_address' => Yii::t('app', 'Ip Address'),
            'camera_req' => Yii::t('app', 'Camera Req'),
            'pract_test' => Yii::t('app', 'Pract Test'),
        ];
    }

    public static function getQuizData($quid = '') {
        $connection = \Yii::$app->db;
        $sql = 'select q.qid, q.question, q.q_type,c.category_name,d.level_name	from'
                . ' qbank q'
                . ' join question_category c on c.cid = q.cid'
                . ' join difficult_level d on d.did = q.did'
                . ' where q.parent_qid = 0';
        $command = $connection->createCommand($sql);
        $data = $command->queryAll();
        return $data;
    }

    public function getQuizDetail($quid = '') {
        
    }

    public static function getCatgoryNameByQuiz($quiz_id = '') {
        $quiz = Quiz::find()->select('qids_static')->where(['quid' => $quiz_id])->asArray()->one();
        $cat = array();
        $data = array();
        $data['isarray'] = 0;
        $quid_data = unserialize($quiz['qids_static']);
        if ($quid_data['type'] == 'manual') {
            $data['category'] = 'Uncategorised';
            $data['question'] = implode(',', $quid_data['ques']);
            $arr = Question::find()->select('qid')->where(['q_type' => 4])->andWhere('qid IN(' . implode(',', $quid_data['ques']) . ')')->asArray()->all();
            if (count($arr) > 0) {
                $data['isarray'] = 1;
            }
        } else {

            $catall = QuestionCategory::find()->select('cid,category_name')->where('cid IN(' . implode(',', $quid_data['category']) . ')')->asArray()->all();
            $qids = array();
            $qids_str = '';
            foreach ($catall as $c) {
                $cat[] = $c['category_name'];
                $qidss = array();
                $qids = Question::find()->select('qid,q_type')->where(['cid' => $c['cid']])->andWhere(['parent_qid' => 0])->asArray()->all();
                foreach ($qids as $qd) {
                    $qidss[] = $qd['qid'];
                    if ($qd['q_type'] == 4) {
                        $data['isarray'] = 1;
                    }
                }

                $qids_str = $qids_str . implode(',', $qidss) . ',';
            }
            $data['question'] = $qids_str;
            $data['category'] = implode(',', $cat);
        }
        return $data;
    }

}
