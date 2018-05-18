<?php

namespace	common\models;

use	Yii;

/**
	* This is the model class for table "quiz_group".
	*
	* @property integer $qgid
	* @property integer $quid
	* @property integer $gid
	*/
class	QuizGroup	extends	\yii\db\ActiveRecord	{

		/**
			* @inheritdoc
			*/
		public	static	function	tableName()	{
				return	'quiz_group';
		}

		/**
			* @inheritdoc
			*/
		public	function	rules()	{
				return	[
								[['quid',	'gid'],	'required'],
								[['quid',	'gid'],	'integer']
				];
		}

		/**
			* @inheritdoc
			*/
		public	function	attributeLabels()	{
				return	[
								'qgid'	=>	Yii::t('app',	'Qgid'),
								'quid'	=>	Yii::t('app',	'Quid'),
								'gid'	=>	Yii::t('app',	'Gid'),
				];
		}

		public	function	getAllgroup($quid	=	0)	{
				$connection	=	\Yii::$app->db;
				$sql	=	'select gid from quiz_group'
												.	' where quid ='	.	$quid;
				$command	=	$connection->createCommand($sql);
				$data	=	$command->queryAll();
				return	$data;
		}

		public	function	updateRelation($groups	=	array(),	$quid)	{
				$sql	=	'INSERT INTO subs
												(subs_name, subs_email, subs_birthday)
												VALUES
												(?, ?, ?)
												ON DUPLICATE KEY UPDATE
												subs_name     = VALUES(subs_name),
												subs_birthday = VALUES(subs_birthday)';
		}
		public function deleteAllMatches($quid='',$gid=''){
				$connection	=	\Yii::$app->db;
				$sql	=	'delete		from quiz_group'
												.	' where quid ='	.	$quid . ' AND gid = '.$gid;
				$command	=	$connection->createCommand($sql);
				$command->execute();
		}
}
