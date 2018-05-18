<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "uploads".
 *
 * @property integer $id
 * @property integer $subject_id
 * @property integer $group_id
 * @property string $topic_name
 * @property string $file_category
 * @property string $file_path
 * @property string $created
 * @property string $modified
 */
class Uploads extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'uploads';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'subject_id' => Yii::t('app', 'Subject ID'),
            'group_ids' => Yii::t('app', 'Group IDs'),
            'topic_name' => Yii::t('app', 'Topic Name'),
            'file_category' => Yii::t('app', 'File Category'),
            'file_path' => Yii::t('app', 'File Path'),
            'created' => Yii::t('app', 'Created'),
            'modified' => Yii::t('app', 'Modified'),
        ];
    }
				public static function getAllFiles($category,$group_id){
						$connection	=	\Yii::$app->db;
						$sql = 'select u.id, fc.name,u.group_ids,u.topic_name,u.file_path from'
														. ' uploads u'
														. ' join file_category fc on fc.id = u.subject_id'
														. ' where  u.file_category ='.$category;
						$command	=	$connection->createCommand($sql);
						$data	=	$command->queryAll();
						$newData = array();
						foreach($data as $dat){
								$groups = explode(',',	$dat['group_ids']);
								if (in_array($group_id, $groups)) {
										$newData[] = $dat;
								}
						}
						return	$newData;
				}
}
