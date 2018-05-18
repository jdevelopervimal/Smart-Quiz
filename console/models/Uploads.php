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
            [['subject_id', 'group_id', 'topic_name', 'file_category', 'file_path', 'created', 'modified'], 'required'],
            [['subject_id', 'group_id'], 'integer'],
            [['created', 'modified'], 'safe'],
            [['topic_name', 'file_category'], 'string', 'max' => 50],
            [['file_path'], 'string', 'max' => 255]
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
            'group_id' => Yii::t('app', 'Group ID'),
            'topic_name' => Yii::t('app', 'Topic Name'),
            'file_category' => Yii::t('app', 'File Category'),
            'file_path' => Yii::t('app', 'File Path'),
            'created' => Yii::t('app', 'Created'),
            'modified' => Yii::t('app', 'Modified'),
        ];
    }
}
