<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_group".
 *
 * @property integer $gid
 * @property string $group_name
 * @property integer $institute_id
 */
class UserGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_name'], 'required'],
            [['institute_id'], 'integer'],
            [['group_name'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'gid' => Yii::t('app', 'Gid'),
            'group_name' => Yii::t('app', 'Group Name'),
            'institute_id' => Yii::t('app', 'Institute ID'),
        ];
    }
}
