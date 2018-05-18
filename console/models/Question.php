<?php

namespace	common\models;

use	Yii;
use	common\models\Options;

/**
	* This is the model class for table "qbank".
	*
	* @property integer $qid
	* @property integer $parent_qid
	* @property string $question
	* @property string $description
	* @property integer $cid
	* @property integer $did
	* @property integer $institute_id
	* @property integer $q_type
	*/
class	Question	extends	\yii\db\ActiveRecord	{

		/**
			* @inheritdoc
			*/
		public	static	function	tableName()	{
				return	'qbank';
		}

		/**
			* @inheritdoc
			*/
		public	function	rules()	{
				return	[
								[['question',	'description',	'cid',	'did',	'q_type'],	'required'],
												// [['parent_qid', 'cid','institute_id', 'q_type'], 'integer'],
				];
		}

		/**
			* @inheritdoc
			*/
		public	function	attributeLabels()	{
				return	[
								'qid'	=>	Yii::t('app',	'Qid'),
								'parent_qid'	=>	Yii::t('app',	'Parent Qid'),
								'question'	=>	Yii::t('app',	'Question'),
								'description'	=>	Yii::t('app',	'Description'),
								'cid'	=>	Yii::t('app',	'Cid'),
								'did'	=>	Yii::t('app',	'Did'),
								'institute_id'	=>	Yii::t('app',	'Institute ID'),
								'q_type'	=>	Yii::t('app',	'Q Type'),
				];
		}

		public	function	getAllQuestion()	{
				$connection	=	\Yii::$app->db;
				$sql	=	'select q.qid, q.question, q.q_type,c.category_name,d.level_name	from'
												.	' qbank q'
												.	' join question_category c on c.cid = q.cid'
												.	' join difficult_level d on d.did = q.did'
												.	' where q.parent_qid = 0';
				$command	=	$connection->createCommand($sql);
				$data	=	$command->queryAll();
				return	$data;
		}

		public	function	getQuestionById($qid)	{
				$connection	=	\Yii::$app->db;
				$sql	=	'select q.qid	,q.question,q.q_type, p.question as parent_question	from'
												.	' qbank q'
												.	' left join qbank p on p.qid = q.parent_qid'
												.	' where q.qid = '	.	$qid;
				$command	=	$connection->createCommand($sql);
				return	$questions	=	$command->queryAll();
		}

		public	function	getQuestionByCat($cat_id)	{
				$connection	=	\Yii::$app->db;
				$sql	=	'select category_name	,cat_duration	from'
												.	' question_category'
												.	' where cid = '	.	$val;
				$command	=	$connection->createCommand($sql);
				return	$data	=	$command->queryAll();
		}

		public	function	getAllQuestions($request	=	'',	$ids	=	array())	{
				$questions	=	array();
				if	($request	==	'cat')	{
						$questions	=	Question::find()->select('qid,question,did,q_type')->where(['cid'	=>	$ids])->andWhere(['parent_qid'	=>	0])->asArray()->all();
				}	else	{
						$questions	=	Question::find()->select('qid,question,did,q_type')->where('qid IN('	.	implode(',',	$ids)	.	')')->andWhere(['parent_qid'	=>	0])->asArray()->all();
				}
				foreach	($questions	as	$key	=>	$qd)	{
						if	($qd['q_type']	==	3)	{
								$sub_ques	=	Question::find()->select('qid,question,did,q_type')->where(['parent_qid'	=>	$qd['qid']])->asArray()->all();
								$options	=	null;
								foreach	($sub_ques	as	$key2	=>	$sub_que)	{
										$sub_ques[$key2]['options']	=	Options::getAllOptions($sub_que['qid']);
								}
								$questions[$key]['sub_ques']	=	$sub_ques;
						}	else	{
								$options	=	Options::getAllOptions($qd['qid']);
						}
						$questions[$key]['options']	=	$options;
				}
				return	$questions;
		}

		public	function	getQuestionCountByIds($qids	=	array())	{
				$connection	=	\Yii::$app->db;
				$sql	=	'SELECT count(q.qid) as noofques FROM qbank q'
												.	' LEFT JOIN qbank qp on qp.parent_qid = q.qid'
												.	' where q.parent_qid= 0 and q.qid IN ('	.	implode(',',	$qids)	.	')';
				$command	=	$connection->createCommand($sql);
				$data	=	$command->queryAll();
				return	$data[0]['noofques'];
		}
		public function getQuestionCountByCategory($catids = array()){
				$connection	=	\Yii::$app->db;
				$sql	=	'SELECT count(q.qid) as noofques FROM qbank q'
												.	' LEFT JOIN qbank qp on qp.parent_qid = q.qid'
												.	' where q.parent_qid= 0 and q.cid IN ('	.	implode(',',	$catids)	.	')';
				$command	=	$connection->createCommand($sql);
				$data	=	$command->queryAll();
				return	$data[0]['noofques'];
		}
		public function getQidsByQuiz($quid){
				
		}
}

//SELECT q.qid,q.q_type, q.parent_qid as parent_main,q.question,qp.question as child ,qp.qid as child_id FROM qbank q
//LEFT JOIN qbank qp on qp.parent_qid = q.qid
//where q.parent_qid= 0 and q.qid IN (1,3,4,5,6,7,8,9,0,7,5,4)