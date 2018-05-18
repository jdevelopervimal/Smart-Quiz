<?php

namespace	common\models;

use	Yii;

/**
	* This is the model class for table "q_options".
	*
	* @property integer $oid
	* @property integer $qid
	* @property string $option_value
	* @property string $score
	* @property integer $institute_id
	*/
class	Options	extends	\yii\db\ActiveRecord	{

		/**
			* @inheritdoc
			*/
		public	static	function	tableName()	{
				return	'q_options';
		}

		/**
			* @inheritdoc
			*/
		public	function	rules()	{
				return	[
//            [['qid', 'option_value', 'score'], 'required'],
//            [['qid', 'institute_id'], 'integer'],
//            [['option_value'], 'string'],
//            [['score'], 'string', 'max' => 10]
				];
		}

		/**
			* @inheritdoc
			*/
		public	function	attributeLabels()	{
				return	[
								'oid'	=>	Yii::t('app',	'Oid'),
								'qid'	=>	Yii::t('app',	'Qid'),
								'option_value'	=>	Yii::t('app',	'Option Value'),
								'score'	=>	Yii::t('app',	'Score'),
								'institute_id'	=>	Yii::t('app',	'Institute ID'),
				];
		}

		public	static	function	getAllOptions($qid	=	'')	{
				$connection	=	\Yii::$app->db;
				$sql	=	'select oid, option_value	,score from'
												.	' q_options'
												.	' where qid = '	.	$qid;
				$command	=	$connection->createCommand($sql);
				$options	=	$command->queryAll();
				return	$options;
		}

}
