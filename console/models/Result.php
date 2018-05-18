<?php

namespace common\models;

use Yii;
use common\models\Quiz;
use common\models\Utility;
/**
 * This is the model class for table "quiz_result".
 *
 * @property integer $rid
 * @property integer $uid
 * @property integer $quid
 * @property string $qids
 * @property string $category_name
 * @property string $qids_range
 * @property string $oids
 * @property integer $start_time
 * @property integer $end_time
 * @property integer $last_response
 * @property integer $time_spent
 * @property string $time_spent_ind
 * @property double $score
 * @property string $percentage
 * @property integer $q_result
 * @property integer $status
 * @property integer $institute_id
 * @property string $photo
 * @property integer $essay_ques
 * @property string $score_ind
 */
class Result extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quiz_result';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['uid', 'quid', 'qids', 'oids', 'start_time', 'end_time', 'last_response', 'time_spent', 'time_spent_ind', 'score', 'q_result', 'photo', 'score_ind'], 'required'],
//            [['uid', 'quid', 'start_time', 'end_time', 'last_response', 'time_spent', 'q_result', 'status', 'institute_id', 'essay_ques'], 'integer'],
//            [['qids', 'oids', 'time_spent_ind', 'photo'], 'string'],
//            [['score'], 'number'],
//            [['category_name', 'qids_range'], 'string', 'max' => 1000],
//            [['percentage'], 'string', 'max' => 10],
//            [['score_ind'], 'string', 'max' => 2000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rid' => Yii::t('app', 'Rid'),
            'uid' => Yii::t('app', 'Uid'),
            'quid' => Yii::t('app', 'Quid'),
            'qids' => Yii::t('app', 'Qids'),
            'category_name' => Yii::t('app', 'Category Name'),
            'qids_range' => Yii::t('app', 'Qids Range'),
            'oids' => Yii::t('app', 'Oids'),
            'start_time' => Yii::t('app', 'Start Time'),
            'end_time' => Yii::t('app', 'End Time'),
            'last_response' => Yii::t('app', 'Last Response'),
            'time_spent' => Yii::t('app', 'Time Spent'),
            'time_spent_ind' => Yii::t('app', 'Time Spent Ind'),
            'score' => Yii::t('app', 'Score'),
            'percentage' => Yii::t('app', 'Percentage'),
            'q_result' => Yii::t('app', 'Q Result'),
            'status' => Yii::t('app', 'Status'),
            'institute_id' => Yii::t('app', 'Institute ID'),
            'photo' => Yii::t('app', 'Photo'),
            'essay_ques' => Yii::t('app', 'Essay Ques'),
            'score_ind' => Yii::t('app', 'Score Ind'),
        ];
    }
				public function setResultEnvironment($user_id='',$quiz_id='',$max_score){
						if(!empty($user_id) && !empty($quiz_id)){
								$data = Quiz::getCatgoryNameByQuiz($quiz_id);
								$result = new Result();
								$result->uid = $user_id;
								$result->quid = $quiz_id;
								$result->category_name = $data['category'];
								$result->qids = '';//$data['question'];
								$result->oids = '';
								$result->start_time =  Yii::$app->formatter->asTimestamp(date('Y-d-m h:i:s'));
								$result->essay_ques= $data['isarray'];
								$result->q_result = ($data['isarray']) ? 0 : 1;
								$result->local_ip = Utility::get_client_ip();
								$result->max_score = $max_score;
								if($result->validate()){
										$result->save();
										return 1;
								}
								return 0;
						}else{
								return 0;
						}
				}
				public function getUserResult($user_id=''){
										$connection	=	\Yii::$app->db;
						$sql = 'select qr.rid,qr.percentage,qr.q_result,qr.essay_ques,qr.score_ind,qr.max_score,qr.score,qr.last_response,qr.start_time,qu.quiz_name,qu.pass_percentage,qu.view_answer from'
														. ' quiz_result qr'
														. ' left join quiz qu on qu.quid = qr.quid'
														. ' where  qr.uid = "'.$user_id.'" AND qr.status = "1"';
						$command	=	$connection->createCommand($sql);
						$data	=	$command->queryAll();
						return	$data;
				}
				public function getAllResult($user_id=''){
						if($user_id == 1){
						$connection	=	\Yii::$app->db;
						$sql = 'select qr.rid,qr.percentage,qr.q_result,qr.essay_ques,qr.score_ind,qr.max_score,qr.score,'
														. ' qr.last_response,qr.start_time,qu.quiz_name,qu.pass_percentage,qu.view_answer, '
														. ' u.first_name, u.last_name,ug.group_name from'
														. ' quiz_result qr'
														. ' left join quiz qu on qu.quid = qr.quid'
														. ' left join user u on		u.id = qr.uid'
														. ' left join user_group ug on		ug.gid = u.group_id'
														. ' where  qr.status = "1"';
						$command	=	$connection->createCommand($sql);
						$data	=	$command->queryAll();
						return	$data;
				}else{
					return	'Invalid Request';	
				}
				}
}

//uid, quid, qids, category_name, oids, start_time, essay_ques